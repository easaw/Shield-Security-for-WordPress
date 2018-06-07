<?php

if ( class_exists( 'ICWP_WPSF_Processor_LoginProtect_GoogleAuthenticator', false ) ) {
	return;
}

require_once( dirname( __FILE__ ).'/loginprotect_intentprovider_base.php' );

class ICWP_WPSF_Processor_LoginProtect_GoogleAuthenticator extends ICWP_WPSF_Processor_LoginProtect_IntentProviderBase {

	/**
	 */
	public function run() {
		parent::run();
		if ( $this->loadDP()->query( 'shield_action' ) == 'garemovalconfirm' ) {
			add_action( 'init', array( $this, 'validateUserGaRemovalLink' ), 10 );
		}
	}

	/**
	 * This MUST only ever be hooked into when the User is looking at their OWN profile, so we can use "current user"
	 * functions.  Otherwise we need to be careful of mixing up users.
	 * @param WP_User $oUser
	 */
	public function addOptionsToUserProfile( $oUser ) {
		$oCon = $this->getController();

		$bValidatedProfile = $this->hasValidatedProfile( $oUser );
		$aData = array(
			'has_validated_profile'            => $bValidatedProfile,
			'user_google_authenticator_secret' => $this->getSecret( $oUser ),
			'is_my_user_profile'               => ( $oUser->ID == $this->loadWpUsers()->getCurrentWpUserId() ),
			'i_am_valid_admin'                 => $oCon->getHasPermissionToManage(),
			'user_to_edit_is_admin'            => $this->loadWpUsers()->isUserAdmin( $oUser ),
			'strings'                          => array(
				'description_otp_code'     => _wpsf__( 'Provide the current code generated by your Google Authenticator app.' ),
				'description_otp_code_ext' => _wpsf__( 'To reset this QR Code enter fake data here.' ),
				'description_chart_url'    => _wpsf__( 'Use your Google Authenticator app to scan this QR code and enter the one time password below.' ),
				'description_ga_secret'    => _wpsf__( 'If you have a problem with scanning the QR code enter this code manually into the app.' ),
				'desc_remove'              => _wpsf__( 'Check the box to remove Google Authenticator login authentication.' ),
				'label_check_to_remove'    => sprintf( _wpsf__( 'Remove %s' ), _wpsf__( 'Google Authenticator' ) ),
				'label_enter_code'         => _wpsf__( 'Google Authenticator Code' ),
				'label_ga_secret'          => _wpsf__( 'Manual Code' ),
				'label_scan_qr_code'       => _wpsf__( 'Scan This QR Code' ),
				'title'                    => _wpsf__( 'Google Authenticator' ),
				'cant_add_other_user'      => sprintf( _wpsf__( "Sorry, %s may not be added to another user's account." ), 'Google Authenticator' ),
				'cant_remove_admins'       => sprintf( _wpsf__( "Sorry, %s may only be removed from another user's account by a Security Administrator." ), _wpsf__( 'Google Authenticator' ) ),
				'provided_by'              => sprintf( _wpsf__( 'Provided by %s' ), $oCon->getHumanName() ),
				'remove_more_info'         => sprintf( _wpsf__( 'Understand how to remove Google Authenticator' ) )
			),
			'data'                             => array(
				'otp_field_name' => $this->getLoginFormParameter()
			)
		);

		if ( !$bValidatedProfile ) {
			$aData[ 'chart_url' ] = $this->getGaRegisterChartUrl( $oUser );
		}

		echo $this->getFeature()->renderTemplate( 'snippets/user_profile_googleauthenticator.php', $aData );
	}

	/**
	 * @param WP_User $oUser
	 * @return string
	 */
	public function getGaRegisterChartUrl( $oUser ) {
		if ( empty( $oUser ) ) {
			$sUrl = '';
		}
		else {
			$sUrl = $this->loadGoogleAuthenticatorProcessor()
						 ->getGoogleQrChartUrl(
							 $this->getSecret( $oUser ),
							 preg_replace( '#[^0-9a-z]#i', '', $oUser->get( 'user_login' ) )
							 .'@'.preg_replace( '#[^0-9a-z]#i', '', $this->loadWp()->getSiteName() )
						 );
		}
		return $sUrl;
	}

	/**
	 * The only thing we can do is REMOVE Google Authenticator from an account that is not our own
	 * But, only admins can do this.  If Security Admin feature is enabled, then only they can do it.
	 * @param int $nSavingUserId
	 */
	public function handleEditOtherUserProfileSubmit( $nSavingUserId ) {
		$oDp = $this->loadDataProcessor();

		// Can only edit other users if you're admin/security-admin
		if ( $this->getController()->getHasPermissionToManage() ) {
			$oWpUsers = $this->loadWpUsers();
			$oSavingUser = $oWpUsers->getUserById( $nSavingUserId );

			$sShieldTurnOff = $oDp->FetchPost( 'shield_turn_off_google_authenticator' );
			if ( !empty( $sShieldTurnOff ) && $sShieldTurnOff == 'Y' ) {

				$bPermissionToRemoveGa = true;
				// if the current user has Google Authenticator on THEIR account, process their OTP.
				$oCurrentUser = $oWpUsers->getCurrentWpUser();
				if ( $this->hasValidatedProfile( $oCurrentUser ) ) {
					$bPermissionToRemoveGa = $this->processOtp(
						$oCurrentUser,
						$this->fetchCodeFromRequest()
					);
				}

				if ( $bPermissionToRemoveGa ) {
					$this->processRemovalFromAccount( $oSavingUser );
					$this->loadAdminNoticesProcessor()
						 ->addFlashMessage(
							 _wpsf__( 'Google Authenticator was successfully removed from the account.' )
						 );
				}
				else {
					$this->loadAdminNoticesProcessor()
						 ->addFlashErrorMessage(
							 _wpsf__( 'Google Authenticator could not be removed from the account - ensure your code is correct.' )
						 );
				}
			}
		}
		else {
			// DO NOTHING EVER
		}
	}

	/**
	 * @param WP_User $oUser
	 * @return $this
	 */
	protected function processRemovalFromAccount( $oUser ) {
		$oMeta = $this->loadWpUsers()->metaVoForUser( $this->prefix(), $oUser->ID );
		$oMeta->ga_validated = 'N';
		$oMeta->ga_secret = 'N';
		return $this;
	}

	/**
	 * This MUST only ever be hooked into when the User is looking at their OWN profile,
	 * so we can use "current user" functions.  Otherwise we need to be careful of mixing up users.
	 * @param int $nSavingUserId
	 */
	public function handleUserProfileSubmit( $nSavingUserId ) {
		$oWpUsers = $this->loadWpUsers();
		$oWpNotices = $this->loadAdminNoticesProcessor();

		$oSavingUser = $oWpUsers->getUserById( $nSavingUserId );

		// If it's your own account, you CANT do anything without your OTP (except turn off via email).
		$sOtp = $this->fetchCodeFromRequest();
		$bValidOtp = $this->processOtp( $oSavingUser, $sOtp );

		$sMessageOtpInvalid = _wpsf__( 'One Time Password (OTP) was not valid.' ).' '._wpsf__( 'Please try again.' );

		$sShieldTurnOff = $this->loadDP()->post( 'shield_turn_off_google_authenticator' );
		if ( !empty( $sShieldTurnOff ) && $sShieldTurnOff == 'Y' ) {

			if ( $bValidOtp ) {
				$this->processRemovalFromAccount( $oSavingUser );
				$this->loadAdminNoticesProcessor()
					 ->addFlashMessage(
						 _wpsf__( 'Google Authenticator was successfully removed from the account.' )
					 );
			}
			else if ( empty( $sOtp ) ) {
				// send email to confirm
				$bEmailSuccess = $this->sendEmailConfirmationGaRemoval( $oSavingUser );
				if ( $bEmailSuccess ) {
					$oWpNotices->addFlashMessage( _wpsf__( 'An email has been sent to you in order to confirm Google Authenticator removal' ) );
				}
				else {
					$oWpNotices->addFlashErrorMessage( _wpsf__( 'We tried to send an email for you to confirm Google Authenticator removal but it failed.' ) );
				}
			}
			else {
				$oWpNotices->addFlashErrorMessage( $sMessageOtpInvalid );
			}
			return;
		}

		// At this stage, if the OTP was empty, then we have no further processing to do.
		if ( empty( $sOtp ) ) {
			return;
		}

		// We're trying to validate our OTP to activate our GA
		if ( !$this->hasValidatedProfile( $oSavingUser ) ) {

			if ( $bValidOtp ) {
				$this->setProfileValidated( $oSavingUser );
				$oWpNotices->addFlashMessage(
					sprintf( _wpsf__( '%s was successfully added to your account.' ),
						_wpsf__( 'Google Authenticator' )
					)
				);
			}
			else {
				$this->resetSecret( $oSavingUser );
				$oWpNotices->addFlashErrorMessage( $sMessageOtpInvalid );
			}
		}
	}

	/**
	 * @param WP_User $oUser
	 * @return WP_Error|WP_User
	 */
	public function processLoginAttempt_FilterOld( $oUser ) {
		/** @var ICWP_WPSF_FeatureHandler_LoginProtect $oFO */
		$oFO = $this->getFeature();
		$oLoginTrack = $this->getLoginTrack();

		// Mulifactor or not
		$bNeedToCheckThisFactor = $oFO->isChainedAuth() || !$this->getLoginTrack()->hasSuccessfulFactor();
		$bErrorOnFailure = $bNeedToCheckThisFactor && $oLoginTrack->isFinalFactorRemainingToTrack();
		$oLoginTrack->addUnSuccessfulFactor( $this->getStub() );

		if ( !$bNeedToCheckThisFactor || !( $oUser instanceof WP_User ) || is_wp_error( $oUser ) ) {
			return $oUser;
		}

		if ( $this->hasValidatedProfile( $oUser ) ) {

			$oError = new WP_Error();

			$sGaOtp = $this->fetchCodeFromRequest();
			$bIsError = false;
			if ( empty( $sGaOtp ) ) {
				$bIsError = true;
				$oError->add( 'shield_google_authenticator_empty',
					_wpsf__( 'Whoops.' ).' '._wpsf__( 'Did we forget to use the Google Authenticator?' ) );
			}
			else {
				$sGaOtp = preg_replace( '/[^0-9]/', '', $sGaOtp );
				if ( !$this->processOtp( $oUser, $sGaOtp ) ) {
					$bIsError = true;
					$oError->add( 'shield_google_authenticator_failed',
						_wpsf__( 'Oh dear.' ).' '._wpsf__( 'Google Authenticator Code Failed.' ) );
				}
			}

			if ( $bIsError ) {
				if ( $bErrorOnFailure ) {
					$oUser = $oError;
				}
				$this->doStatIncrement( 'login.googleauthenticator.fail' );
			}
			else {
				$this->doStatIncrement( 'login.googleauthenticator.verified' );
				$oLoginTrack->addSuccessfulFactor( $this->getStub() );
			}
		}
		return $oUser;
	}

	/**
	 * @param array $aFields
	 * @return array
	 */
	public function addLoginIntentField( $aFields ) {
		if ( $this->getCurrentUserHasValidatedProfile() ) {
			$aFields[] = array(
				'name'        => $this->getLoginFormParameter(),
				'type'        => 'text',
				'value'       => '',
				'placeholder' => _wpsf__( 'Please use your Google Authenticator App to retrieve your code.' ),
				'text'        => _wpsf__( 'Google Authenticator Code' ),
				'help_link'   => 'https://icwp.io/wpsf42',
				'extras'      => array(
					'onkeyup' => "this.value=this.value.replace(/[^\d]/g,'')"
				)
			);
		}
		return $aFields;
	}

	/**
	 * @param WP_User $oUser
	 * @return bool
	 */
	protected function sendEmailConfirmationGaRemoval( $oUser ) {
		$bSendSuccess = false;

		$aEmailContent = array();
		$aEmailContent[] = _wpsf__( 'You have requested the removal of Google Authenticator from your WordPress account.' )
						   ._wpsf__( 'Please click the link below to confirm.' );
		$aEmailContent[] = $this->generateGaRemovalConfirmationLink();

		$sRecipient = $oUser->get( 'user_email' );
		if ( $this->loadDataProcessor()->validEmail( $sRecipient ) ) {
			$sEmailSubject = _wpsf__( 'Google Authenticator Removal Confirmation' );
			$bSendSuccess = $this->getEmailProcessor()
								 ->sendEmailWithWrap( $sRecipient, $sEmailSubject, $aEmailContent );
		}
		return $bSendSuccess;
	}

	/**
	 */
	public function validateUserGaRemovalLink() {
		// Must be already logged in for this link to work.
		$oWpCurrentUser = $this->loadWpUsers()->getCurrentWpUser();
		if ( empty( $oWpCurrentUser ) ) {
			return;
		}

		// Session IDs must be the same
		$sSessionId = $this->loadDP()->query( 'sessionid' );
		if ( empty( $sSessionId ) || ( $sSessionId !== $this->getController()->getSessionId() ) ) {
			return;
		}

		$this->processRemovalFromAccount( $oWpCurrentUser );
		$this->loadAdminNoticesProcessor()
			 ->addFlashMessage( _wpsf__( 'Google Authenticator was successfully removed from this account.' ) );
		$this->loadWp()->redirectToAdmin();
	}

	/**
	 * @param WP_User $oUser
	 * @param string  $sOtpCode
	 * @return bool
	 */
	protected function processOtp( $oUser, $sOtpCode ) {
		return $this->validateGaCode( $oUser, $sOtpCode );
	}

	/**
	 * @param WP_User $oUser
	 * @param string  $sOtpCode
	 * @return bool
	 */
	public function validateGaCode( $oUser, $sOtpCode ) {
		$bValidOtp = false;
		if ( !empty( $sOtpCode ) && preg_match( '#^[0-9]{6}$#', $sOtpCode ) ) {
			$bValidOtp = $this->loadGoogleAuthenticatorProcessor()
							  ->verifyOtp( $this->getSecret( $oUser ), $sOtpCode );
		}
		return $bValidOtp;
	}

	/**
	 * @param WP_User $oUser
	 * @param bool    $bIsSuccess
	 */
	protected function auditLogin( $oUser, $bIsSuccess ) {
		if ( $bIsSuccess ) {
			$this->addToAuditEntry(
				sprintf(
					_wpsf__( 'User "%s" verified their identity using Google Authenticator Two-Factor Authentication.' ),
					$oUser->user_login ), 2, 'login_protect_ga_verified'
			);
			$this->doStatIncrement( 'login.googleauthenticator.verified' );
		}
		else {
			$this->addToAuditEntry(
				sprintf(
					_wpsf__( 'User "%s" failed to verify their identity using Google Authenticator Two-Factor Authentication.' ),
					$oUser->user_login ), 2, 'login_protect_ga_failed'
			);
			$this->doStatIncrement( 'login.googleauthenticator.fail' );
		}
	}

	/**
	 * @return string
	 */
	protected function generateGaRemovalConfirmationLink() {
		$aQueryArgs = array(
			'shield_action' => 'garemovalconfirm',
			'sessionid'     => $this->getController()->getSessionId()
		);
		return add_query_arg( $aQueryArgs, $this->loadWp()->getUrl_WpAdmin() );
	}

	/**
	 * @return string
	 */
	protected function genNewSecret() {
		return $this->loadGoogleAuthenticatorProcessor()->generateNewSecret();
	}

	/**
	 * @return string
	 */
	protected function getStub() {
		return ICWP_WPSF_Processor_LoginProtect_Track::Factor_Google_Authenticator;
	}

	/**
	 * @param string $sSecret
	 * @return bool
	 */
	protected function isSecretValid( $sSecret ) {
		return parent::isSecretValid( $sSecret ) && ( strlen( $sSecret ) == 16 );
	}
}