<?php

if ( class_exists( 'ICWP_WPSF_Wizard_HackProtect', false ) ) {
	return;
}

require_once( dirname( __FILE__ ).'/base_wpsf.php' );

/**
 * Class ICWP_WPSF_Wizard_HackProtect
 */
class ICWP_WPSF_Wizard_HackProtect extends ICWP_WPSF_Wizard_BaseWpsf {

	/**
	 * @return string
	 */
	protected function getPageTitle() {
		return sprintf( _wpsf__( '%s Hack Protect Wizard' ), $this->getPluginCon()->getHumanName() );
	}

	/**
	 * @param string $sKey
	 * @return bool
	 */
	protected function getWizardAvailability( $sKey ) {
		switch ( $sKey ) {
			case 'ptg':
				/** @var ICWP_WPSF_FeatureHandler_HackProtect $oFO */
				$oFO = $this->getModCon();
				$bAvailable = $oFO->isPtgEnabled();
				break;
			default:
				$bAvailable = parent::getWizardAvailability( $sKey );
				break;
		}
		return $bAvailable;
	}

	/**
	 * @param string $sStep
	 * @return \FernleafSystems\Utilities\Response|null
	 */
	protected function processWizardStep( $sStep ) {
		switch ( $sStep ) {
			case 'exclusions':
				$oResponse = $this->process_Exclusions();
				break;
			case 'deletefiles':
				$oResponse = $this->process_DeleteFiles();
				break;
			case 'restorefiles':
				$oResponse = $this->process_RestoreFiles();
				break;
			case 'ptgconfig':
				$oResponse = $this->process_PtgConfig();
				break;
			case 'ufcconfig':
				$oResponse = $this->process_UfcConfig();
				break;
			case 'wcfconfig':
				$oResponse = $this->process_WcfConfig();
				break;
			case 'ptg_assetaction':
				$oResponse = $this->process_AssetAction();
				break;
			default:
				$oResponse = parent::processWizardStep( $sStep );
				break;
		}
		return $oResponse;
	}

	/**
	 * @return \FernleafSystems\Utilities\Response
	 */
	private function process_Exclusions() {
		/** @var ICWP_WPSF_FeatureHandler_HackProtect $oFO */
		$oFO = $this->getModCon();
		$oFO->setUfcFileExclusions( explode( "\n", $this->loadRequest()->post( 'exclusions' ) ) );

		$oResponse = new \FernleafSystems\Utilities\Response();
		return $oResponse->setSuccessful( true )
						 ->setMessageText( 'File exclusions list has been updated.' );
	}

	/**
	 * @return \FernleafSystems\Utilities\Response
	 */
	private function process_DeleteFiles() {
		/** @var ICWP_WPSF_FeatureHandler_HackProtect $oFO */
		$oFO = $this->getModCon();

		$oResponse = new \FernleafSystems\Utilities\Response();
		if ( $this->loadRequest()->post( 'DeleteFiles' ) === 'Y' ) {
			// First get the current setting and if necessary, modify it and then reset it.
			$sDesiredOption = 'enabled_delete_only';
			$sCurrentOption = $oFO->getUnrecognisedFileScannerOption();
			if ( $sCurrentOption != $sDesiredOption ) {
				$oFO->setUfcOption( $sDesiredOption );
			}

			/** @var ICWP_WPSF_Processor_HackProtect $oProc */
			$oProc = $oFO->getProcessor();
			$oProc->getSubProcessorFileCleanerScan()
				  ->runScan();
			$oFO->setUfcOption( $sCurrentOption )
				->savePluginOptions();

			$oResponse->setSuccessful( true );
			$sMessage = 'If your filesystem permissions allowed it, the scanner will have deleted these files.';
		}
		else {
			$oResponse->setSuccessful( false );
			$sMessage = 'No attempt was made to delete any files since the checkbox was not checked.';
		}

		return $oResponse->setMessageText( $sMessage );
	}

	/**
	 * @return \FernleafSystems\Utilities\Response
	 */
	private function process_RestoreFiles() {
		/** @var ICWP_WPSF_FeatureHandler_HackProtect $oFO */
		$oFO = $this->getModCon();

		if ( $this->loadRequest()->post( 'RestoreFiles' ) === 'Y' ) {
			/** @var ICWP_WPSF_Processor_HackProtect $oProc */
			$oProc = $oFO->getProcessor();
			$oProc->getSubProcessorChecksumScan()->doChecksumScan( true );

			$sMessage = 'The scanner will have restore these files if your filesystem permissions allowed it.';
		}
		else {
			$sMessage = 'No attempt was made to restore the files since the checkbox was not checked.';
		}

		$oResponse = new \FernleafSystems\Utilities\Response();
		return $oResponse->setSuccessful( true )
						 ->setMessageText( $sMessage );
	}

	/**
	 * @return \FernleafSystems\Utilities\Response
	 */
	private function process_PtgConfig() {
		/** @var ICWP_WPSF_FeatureHandler_HackProtect $oFO */
		$oFO = $this->getModCon();

		$sSetting = $this->loadRequest()->post( 'enable_scan' );
		$oFO->setPtgEnabledOption( $sSetting )
			->savePluginOptions();

		$bSuccess = ( $sSetting == $oFO->getPtgEnabledOption() );

		if ( $bSuccess && $oFO->isPtgEnabled() ) {
			$sMessage = 'Scanner automation has been enabled.';
		}
		else {
			$sMessage = 'There was a problem with saving this option. You may need to reload.';
		}

		$oResponse = new \FernleafSystems\Utilities\Response();
		return $oResponse->setSuccessful( $bSuccess )
						 ->setMessageText( $sMessage );
	}

	/**
	 * @return \FernleafSystems\Utilities\Response
	 */
	private function process_UfcConfig() {
		/** @var ICWP_WPSF_FeatureHandler_HackProtect $oFO */
		$oFO = $this->getModCon();

		$sSetting = $this->loadRequest()->post( 'enable_scan' );
		$oFO->setUfcOption( $sSetting )
			->savePluginOptions();

		$bSuccess = ( $sSetting == $oFO->getUnrecognisedFileScannerOption() );

		if ( $bSuccess ) {
			if ( $oFO->isUfcEnabled() ) {
				$sMessage = 'Scanner automation has been enabled.';
			}
			else {
				$sMessage = 'Scanner automation has been disabled.';
			}
		}
		else {
			$sMessage = 'There was a problem with saving this option. You may need to reload.';
		}

		$oResponse = new \FernleafSystems\Utilities\Response();
		return $oResponse->setSuccessful( $bSuccess )
						 ->setMessageText( $sMessage );
	}

	/**
	 * @return \FernleafSystems\Utilities\Response
	 */
	private function process_WcfConfig() {
		/** @var ICWP_WPSF_FeatureHandler_HackProtect $oFO */
		$oFO = $this->getModCon();

		$sSetting = $this->loadRequest()->post( 'enable_scan' );

		$bEnabled = true;
		$bRestore = false;
		$bProcess = true;
		switch ( $sSetting ) {
			case 'enabled_report_only':
				break;
			case 'enabled_restore_report':
				$bRestore = true;
				break;
			default:
				$bProcess = false;
				break;
		}

		$bSuccess = false;
		if ( $bProcess ) {

			$oFO->setWcfScanEnabled( $bEnabled )
				->setWcfScanAutoRepair( $bRestore )
				->savePluginOptions();

			$bSuccess = ( $bEnabled == $oFO->isWcfScanEnabled() ) && ( $bRestore === $oFO->isWcfScanAutoRepair() );

			if ( $bSuccess ) {
				if ( $bEnabled ) {
					$sMessage = 'Scanner automation has been enabled.';
				}
				else {
					$sMessage = 'Scanner automation has been disabled.';
				}
			}
			else {
				$sMessage = 'There was a problem with saving this option. You may need to reload.';
			}
		}
		else {
			$sMessage = 'Scanner automation is unchanged because of failed request.';
		}

		$oResponse = new \FernleafSystems\Utilities\Response();
		return $oResponse->setSuccessful( $bSuccess )
						 ->setMessageText( $sMessage );
	}

	/**
	 * @return \FernleafSystems\Utilities\Response
	 */
	private function process_AssetAction() {
		/** @var ICWP_WPSF_FeatureHandler_HackProtect $oFO */
		$oFO = $this->getModCon();
		$oReq = $this->loadRequest();

		$sSlug = $oReq->post( 'slug' );
		$sContext = $oReq->post( 'context' );
		$sItemAction = $oReq->post( 'ptgaction' );

		$oWpPlugins = $this->loadWpPlugins();
		$oWpThemes = $this->loadWpThemes();

		// 1. load the asset
		if ( $sContext == 'plugins' ) {
			$mAsset = $oWpPlugins->getPlugin( $sSlug );
			$bWpOrg = $oWpPlugins->isWpOrg( $sSlug );
		}
		else { //$sContext == 'themes'
			$mAsset = $oWpThemes->getTheme( $sSlug );
			$bWpOrg = $oWpThemes->isWpOrg( $sSlug );
		}

		/** @var ICWP_WPSF_Processor_HackProtect $oP */
		$oP = $oFO->getProcessor();
		$oGuard = $oP->getSubProcessorGuard();

		$bSuccess = false;
		if ( empty( $mAsset ) && $sItemAction != 'ignore' ) { // we can only ignore "empty"/missing assets
			$sMessage = 'Item could not be found.';
		}
		else {
			switch ( $sItemAction ) {

				case 'reinstall':
					if ( $bWpOrg ) {
						$bSuccess = $oGuard->reinstall( $sSlug, $sContext );
						$sMessage = 'The item has been re-installed from WordPress.org sources.';
					}
					break;

				case 'ignore':
					if ( empty( $mAsset ) ) {
						$oGuard->deleteItemFromSnapshot( $sSlug, $sContext );
					}
					else {
						$oGuard->updateItemInSnapshot( $sSlug, $sContext );
					}
					$bSuccess = true;
					$sMessage = _wpsf__( 'All changes detected have been ignored.' );
					break;

				case 'deactivate':
					if ( $sContext == 'plugins' ) {
						$oWpPlugins->deactivate( $sSlug );
						$bSuccess = true;
						$sMessage = _wpsf__( 'The plugin has been deactivated.' );
					}
					break;

				default:
					$sMessage = 'Action not supported.'.$sItemAction;
					break;
			}
		}

		//_wpsf__( 'Success.' )

		$oResponse = new \FernleafSystems\Utilities\Response();
		return $oResponse->setSuccessful( $bSuccess )
						 ->setMessageText( $sMessage );
	}

	/**
	 * @return string[]
	 * @throws Exception
	 */
	protected function determineWizardSteps() {

		switch ( $this->getWizardSlug() ) {
			case 'wcf':
				$aSteps = $this->determineWizardSteps_Wcf();
				break;
			case 'ufc':
				$aSteps = $this->determineWizardSteps_Ufc();
				break;
			case 'ptg':
				$aSteps = $this->determineWizardSteps_Ptg();
				break;
			default:
				parent::determineWizardSteps();
				break;
		}
		return array_values( array_intersect( array_keys( $this->getAllDefinedSteps() ), $aSteps ) );
	}

	/**
	 * @return string[]
	 */
	private function determineWizardSteps_Ptg() {
		/** @var ICWP_WPSF_FeatureHandler_HackProtect $oFO */
		$oFO = $this->getModCon();

		$aStepsSlugs = array(
			'start',
		);
		if ( !$oFO->isPtgEnabled() ) {
			$aStepsSlugs[] = 'config';
		}
		else {
			$aStepsSlugs[] = 'scanresult_plugins';
			$aStepsSlugs[] = 'scanresult_themes';
		}
		$aStepsSlugs[] = 'finished';
		return $aStepsSlugs;
	}

	/**
	 * @return string[]
	 */
	private function determineWizardSteps_Wcf() {
		/** @var ICWP_WPSF_FeatureHandler_HackProtect $oFO */
		$oFO = $this->getModCon();

		$aStepsSlugs = array(
			'start',
			'scanresult',
		);
		if ( !$oFO->isWcfScanEnabled() ) {
			$aStepsSlugs[] = 'config';
		}
		$aStepsSlugs[] = 'finished';
		return $aStepsSlugs;
	}

	/**
	 * @return string[]
	 */
	private function determineWizardSteps_Ufc() {
		/** @var ICWP_WPSF_FeatureHandler_HackProtect $oFO */
		$oFO = $this->getModCon();

		$aStepsSlugs = array(
			'start',
			'exclusions',
			'scanresult'
		);
		if ( !$oFO->isUfcEnabled() ) {
			$aStepsSlugs[] = 'config';
		}
		$aStepsSlugs[] = 'finished';
		return $aStepsSlugs;
	}

	/**
	 * @param string $sStep
	 * @return array
	 */
	protected function getRenderData_SlideExtra( $sStep ) {
		/** @var ICWP_WPSF_FeatureHandler_HackProtect $oFO */
		$oFO = $this->getModCon();
		/** @var ICWP_WPSF_Processor_HackProtect $oProc */
		$oProc = $oFO->getProcessor();

		$aAdditional = array();

		$sCurrentWiz = $this->getWizardSlug();

		if ( $sCurrentWiz == 'ufc' ) {
			switch ( $sStep ) {

				case 'exclusions':
					$aFiles = $oFO->getUfcFileExclusions();
					$aAdditional[ 'data' ] = array(
						'files' => array(
							'count' => count( $aFiles ),
							'has'   => !empty( $aFiles ),
							'list'  => implode( "\n", array_map( 'stripslashes', $aFiles ) ),
						)
					);
					break;

				case 'scanresult':
					$aFiles = $this->cleanAbsPath( $oProc->getSubProcessorFileCleanerScan()->discoverFiles() );

					$aAdditional[ 'data' ] = array(
						'files' => array(
							'count' => count( $aFiles ),
							'has'   => !empty( $aFiles ),
							'list'  => $aFiles,
						)
					);
					break;
			}
		}
		else if ( $sCurrentWiz == 'wcf' ) {

			switch ( $sStep ) {
				case 'scanresult':
					$aFiles = $oProc->getSubProcessorChecksumScan()->doChecksumScan( false );
					$aChecksum = $this->cleanAbsPath( $aFiles[ 'checksum_mismatch' ] );
					$aMissing = $this->cleanAbsPath( $aFiles[ 'missing' ] );

					$aAdditional[ 'data' ] = array(
						'files' => array(
							'count'    => count( $aChecksum ) + count( $aMissing ),
							'has'      => !empty( $aChecksum ) || !empty( $aMissing ),
							'checksum' => array(
								'count' => count( $aChecksum ),
								'has'   => !empty( $aChecksum ),
								'list'  => $aChecksum,
							),
							'missing'  => array(
								'count' => count( $aMissing ),
								'has'   => !empty( $aMissing ),
								'list'  => $aMissing,
							)
						)
					);
					break;
			}
		}
		else if ( $sCurrentWiz == 'ptg' ) {

			switch ( $sStep ) {
				case 'scanresult_themes':
					$aAdditional[ 'data' ] = $this->getPtgScanResults( 'themes' );
					break;
				case 'scanresult_plugins':
					$aAdditional[ 'data' ] = $this->getPtgScanResults( 'plugins' );
					break;
			}
		}

		if ( empty( $aAdditional ) ) {
			$aAdditional = parent::getRenderData_SlideExtra( $sStep );
		}
		return $aAdditional;
	}

	private function getPtgScanResults( $sContext ) {
		/** @var ICWP_WPSF_Processor_HackProtect $oProc */
		$oProc = $this->getModCon()->getProcessor();
		$oP = $oProc->getSubProcessorGuard();
		if ( $sContext == 'plugins' ) {
			$aResults = $oP->scanPlugins();
		}
		else {
			$aResults = $oP->scanThemes();
		}

		$oWpPlugins = $this->loadWpPlugins();
		$oWpThemes = $this->loadWpThemes();
		foreach ( $aResults as $sSlug => $aItem ) {

			if ( $sContext == 'plugins' ) {
				$bIsWpOrg = $oWpPlugins->isWpOrg( $sSlug );
				$bInstalled = $oWpPlugins->isInstalled( $sSlug );
				if ( $bInstalled ) {
					$sName = $oWpPlugins->getPlugin( $sSlug )[ 'Name' ];
				}
				$bCanReinstall = $bInstalled && $bIsWpOrg;
				$bCanDeactivate = $bInstalled;
			}
			else {
				$bIsWpOrg = $oWpThemes->isWpOrg( $sSlug );
				$bInstalled = $oWpThemes->isInstalled( $sSlug );
				if ( $bInstalled ) {
					$sName = $oWpThemes->getTheme( $sSlug )->get( 'Name' );
				}
				$bCanReinstall = $bInstalled && $bIsWpOrg;
				$bCanDeactivate = false;
			}

			if ( empty( $sName ) ) {
				$sName = isset( $aItem[ 'meta' ][ 'name' ] ) ? $aItem[ 'meta' ][ 'name' ] : 'Unknown: '.$sSlug;
			}

			$aResults[ $sName ] = $this->stripPaths( $aItem );
			$aResults[ $sName ][ 'flags' ] = array(
				'is_wporg'       => $bIsWpOrg,
				'can_reinstall'  => $bCanReinstall,
				'can_deactivate' => $bCanDeactivate,
				'slug'           => $sSlug,
				'id'             => $sContext.sanitize_key( $sSlug ),
				'is_installed'   => $bInstalled
			);
			unset( $aResults[ $sSlug ] );
		}

		return array(
			'context_sing' => rtrim( ucfirst( $sContext ), 's' ),
			'context'      => $sContext,
			'result'       => $aResults,
		);
	}

	/**
	 * @param array[] $aLists
	 * @return int
	 */
	private function count( $aLists ) {
		$nCount = 0;
		foreach ( $aLists as $aList ) {
			$nCount += count( $aList );
		}
		return $nCount;
	}

	/**
	 * @param array[] $aLists
	 * @return array[]
	 */
	private function stripPaths( $aLists ) {
		foreach ( $aLists as $sKey => $aList ) {
			if ( is_array( $aList ) ) {
				$aLists[ $sKey ] = array_map(
					function ( $sPath ) {
						return ltrim( str_replace( WP_CONTENT_DIR, '', $sPath ), '/' );
					},
					$aList
				);
			}
			else {
				$aLists[ $sKey ] = $aList;
			}
		}
		return $aLists;
	}

	/**
	 * @param string[] $aFilePaths
	 * @return  string[]
	 */
	private function cleanAbsPath( $aFilePaths ) {
		return array_map(
			function ( $sFile ) {
				return str_replace( ABSPATH, '', $sFile );
			},
			$aFilePaths
		);
	}
}