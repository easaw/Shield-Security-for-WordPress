<?php

if ( class_exists( 'ICWP_WPSF_Processor_UserManagement_Passwords', false ) ) {
	return;
}

require_once( dirname( __FILE__ ).'/base_wpsf.php' );

/**
 * Referenced some of https://github.com/BenjaminNelan/PwnedPasswordChecker
 * Class ICWP_WPSF_Processor_UserManagement_Pwned
 */
class ICWP_WPSF_Processor_UserManagement_Passwords extends ICWP_WPSF_Processor_BaseWpsf {

	public function run() {
		// Account Reg
		add_filter( 'registration_errors', array( $this, 'checkPassword' ), 100, 3 );
		// Profile Update
		add_action( 'user_profile_update_errors', array( $this, 'checkPassword' ), 100, 3 );
		// Reset
		add_action( 'validate_password_reset', array( $this, 'checkPassword' ), 100, 3 );

		add_action( 'wp_loaded', array( $this, 'onWpLoaded' ) );
		// Login
		add_filter( 'authenticate', array( $this, 'checkPassword' ), 100, 3 );
		$this->loadAutoload();
	}

	public function onWpLoaded() {
		if ( $this->loadWpUsers()->isUserLoggedIn() ) {
			$this->processExpiredPassword();
		}
	}

	private function processExpiredPassword() {
		/** @var ICWP_WPSF_FeatureHandler_UserManagement $oFO */
		$oFO = $this->getFeature();
		$bExpired = false;
		$nExpireTimeout = $oFO->getPassExpireTimeout();
		if ( $nExpireTimeout > 0 ) {
			$oMeta = $oFO->getCurrentUserMeta();
			if ( !empty( $oMeta->pass_hash ) ) { // we can only do this if we've recorded a password
				$bExpired = ( $this->time() - $oMeta->pass_started_at ) > $nExpireTimeout;
			}
		}

		// TODO Test this URL on wpms
		if ( $bExpired ) {
			$this->loadWp()
				 ->doRedirect(
					 self_admin_url( 'profile.php' ),
					 array(
						 $oFO->prefix( 'force-user-password' ) => '1'
					 )
				 );
		}
	}

	/**
	 * @param WP_Error $oErrors
	 * @return WP_Error
	 */
	public function checkPassword( $oErrors ) {
		$aExistingCodes = $oErrors->get_error_code();
		if ( empty( $aExistingCodes ) ) {
			$sPassword = $this->getLoginPassword();

			if ( !empty( $sPassword ) ) {
				try {
					$this->getPasswordMeetsMinimumLength( $sPassword );
					$this->getPasswordMeetsMinimumStrength( $sPassword );
					$this->sendRequestToPwned( $sPassword );
				}
				catch ( Exception $oE ) {
					$sMessage = _wpsf__( 'Your site security administrator has imposed requirements for password quality.' )
								.' '.$oE->getMessage();
					$oErrors->add( 'shield_password_policy', $sMessage );
				}
			}
		}

		return $oErrors;
	}

	/**
	 * @param string $sPassword
	 * @return bool
	 * @throws Exception
	 */
	protected function getPasswordMeetsMinimumStrength( $sPassword ) {
		/** @var ICWP_WPSF_FeatureHandler_UserManagement $oFO */
		$oFO = $this->getFeature();
		$nMin = $oFO->getPassMinStrength();

		$oStengther = new \ZxcvbnPhp\Zxcvbn();
		$aResults = $oStengther->passwordStrength( $sPassword );
		$nScore = $aResults[ 'score' ];

		if ( $nMin > 0 && $nScore < $nMin ) {
			throw new Exception( sprintf( "Password strength (%s) doesn't meet the minimum required (%s).",
				$oFO->getPassStrengthName( $nScore ), $oFO->getPassStrengthName( $nMin ) ) );
		}
		return true;
	}

	/**
	 * @param string $sPassword
	 * @return bool
	 * @throws Exception
	 */
	protected function getPasswordMeetsMinimumLength( $sPassword ) {
		/** @var ICWP_WPSF_FeatureHandler_UserManagement $oFO */
		$oFO = $this->getFeature();
		$nMin = $oFO->getPassMinLength();
		$nLength = strlen( $sPassword );
		if ( $nMin > 0 && $nLength < $nMin ) {
			throw new Exception( sprintf( _wpsf__( 'Password length (%s) too short (min: %s characters)' ), $nLength, $nMin ) );
		}
		return true;
	}

	/**
	 * @return bool
	 */
	protected function verifyApiAccess() {
		try {
			$this->sendRequestToPwned( 'P@ssw0rd' );
		}
		catch ( Exception $oE ) {
			return false;
		}
		return true;
	}

	/**
	 * @param string $sPass
	 * @return bool
	 * @throws Exception
	 */
	protected function sendRequestToPwned( $sPass ) {
		$oConn = $this->getController();
		$aResponse = $this->loadFS()->requestUrl(
			sprintf( 'https://api.pwnedpasswords.com/pwnedpassword/%s', hash( 'sha1', $sPass ) ),
			array(
				'headers' => array(
					'user-agent' => sprintf( '%s WP Plugin-v%s', $oConn->getHumanName(), $oConn->getVersion() )
				)
			),
			true
		);

		$sError = '';
		if ( is_wp_error( $aResponse ) ) {
			$sError = $aResponse->get_error_message();
		}
		else if ( empty( $aResponse ) ) {
			$sError = 'Response was empty';
		}
		else if ( is_array( $aResponse ) ) {
			if ( empty( $aResponse[ 'response' ][ 'code' ] ) ) {
				$sError = 'Unexpected Error: No response code available from the API';
			}
			else if ( $aResponse[ 'response' ][ 'code' ] == 404 ) {
				// means that the password isn't on the pwned list. It's acceptable.
			}
			else if ( empty( $aResponse[ 'body' ] ) ) {
				$sError = 'Unexpected Error: The response from the API was empty';
			}
			else {
				// password pwned
				$nCount = intval( preg_replace( '#[^0-9]#', '', $aResponse[ 'body' ] ) );
				$sError = _wpsf__( 'Please use a different password.' )
						  .' '._wpsf__( 'This password has already been pwned.' )
						  .' '.sprintf(
							  '(<a href="%s" target="_blank">%s</a>)',
							  'https://www.troyhunt.com/ive-just-launched-pwned-passwords-version-2/',
							  sprintf( _wpsf__( '%s times' ), $nCount )
						  );
			}
		}

		if ( !empty( $sError ) ) {
			throw new Exception( $sError );
		}

		return true;
	}

	/**
	 * @return string
	 */
	private function getLoginPassword() {
		return $this->loadDP()->post( 'pass1' );
	}
}