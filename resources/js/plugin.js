var iCWP_WPSF_OptionsPages = new function () {

	var showWaiting = function ( event ) {
		/* var $oLink = jQuery( this ); for the inner collapses
		jQuery( '#' + $oLink.data( 'targetcollapse' ) ).collapse( 'show' ); */

		iCWP_WPSF_BodyOverlay.show();
	};

	var moveCarousel0 = function ( event ) {
		moveCarousel( 0 );
	};
	var moveCarousel1 = function ( event ) {
		moveCarousel( 1 );
	};
	var moveCarousel2 = function ( event ) {
		moveCarousel( 2 );
	};
	var moveCarousel3 = function ( event ) {
		moveCarousel( 3 );
	};

	var moveCarousel = function ( nSlide ) {
		jQuery( '.icwp-carousel' ).carousel( nSlide );
	};

	this.initialise = function () {
		jQuery( document ).ready( function () {
			jQuery( document ).on( "click", "a.nav-link.module", showWaiting );
			jQuery( document ).on( "click", "a.icwp-carousel-0", moveCarousel0 );
			jQuery( document ).on( "click", "a.icwp-carousel-1", moveCarousel1 );
			jQuery( document ).on( "click", "a.icwp-carousel-2", moveCarousel2 );
			jQuery( document ).on( "click", "a.icwp-carousel-3", moveCarousel3 );

			/** Track active tab */
			jQuery( document ).on( "click", "#ModuleOptionsNav a.nav-link", function ( e ) {
				e.preventDefault();
				jQuery( this ).tab( 'show' );
				jQuery( 'html,body' ).scrollTop( 0 );
			} );
			jQuery( document ).on( "shown.bs.tab", "#ModuleOptionsNav a.nav-link", function ( e ) {
				window.location.hash = jQuery( e.target ).attr( "href" ).substr( 1 );
			} );

			var sActiveTabHash = window.location.hash;
			if ( sActiveTabHash ) {
				jQuery( '#ModuleOptionsNav a[href="' + window.location.hash + '"]' ).tab( 'show' );
			}
		} );
	};

}();

var iCWP_WPSF_OptionsFormSubmit = new function () {

	var bRequestCurrentlyRunning = false;

	this.submit = function ( sMessage, bSuccess ) {
		var $oDiv = createDynDiv( bSuccess ? 'success' : 'failed' );
		$oDiv.fadeIn().html( sMessage );
		setTimeout( function () {
			$oDiv.fadeOut( 5000 );
			$oDiv.remove();
		}, 4000 );
	};

	/**
	 */
	var submitOptionsForm = function ( event ) {
		iCWP_WPSF_BodyOverlay.show();

		if ( bRequestCurrentlyRunning ) {
			return false;
		}
		bRequestCurrentlyRunning = true;
		event.preventDefault();

		var $oForm = jQuery( this );

		var $bPasswordsReady = true;
		jQuery( 'input[type=password]', $oForm ).each( function () {
			var $oPass = jQuery( this );
			var $oConfirm = jQuery( '#' + $oPass.attr( 'id' ) + '_confirm', $oForm );
			if ( typeof $oConfirm.attr( 'id' ) !== 'undefined' ) {
				if ( $oPass.val() && !$oConfirm.val() ) {
					$oConfirm.addClass( 'is-invalid' );
					alert( 'Form not submitted due to error: password confirmation field not provided.' );
					$bPasswordsReady = false;
				}
			}
		} );

		if ( $bPasswordsReady ) {
			jQuery.post( ajaxurl, $oForm.serialize(),
				function ( oResponse ) {
					var sMessage;
					if ( oResponse === null || typeof oResponse.data === 'undefined'
						|| typeof oResponse.data.message === 'undefined' ) {
						sMessage = oResponse.success ? 'Success' : 'Failure';
					}
					else {
						sMessage = oResponse.data.message;
					}
					iCWP_WPSF_Growl.showMessage( sMessage, oResponse.success );
				}
			).always( function () {
					bRequestCurrentlyRunning = false;
					setTimeout( function () {
						location.reload( true );
					}, 2000 );
				}
			);
		}
		else {
			bRequestCurrentlyRunning = false;
			iCWP_WPSF_BodyOverlay.hide();
		}
	};

	this.initialise = function () {
		jQuery( document ).ready( function () {
			jQuery( document ).on( "submit", "form.icwpOptionsForm", submitOptionsForm );
		} );
	};
}();

iCWP_WPSF_OptionsPages.initialise();
iCWP_WPSF_OptionsFormSubmit.initialise();

if ( typeof icwp_wpsf_vars_secadmin !== 'undefined' && icwp_wpsf_vars_secadmin.timeleft > 0 ) {

	var iCWP_WPSF_SecurityAdminCheck = new function () {

		var bCheckInPlace = false;
		var bWarningShown = false;
		var nIntervalTimeout = 500 * icwp_wpsf_vars_secadmin.timeleft;

		/**
		 */
		var checkSecAdmin = function () {

			bCheckInPlace = false;

			jQuery.post( ajaxurl, icwp_wpsf_vars_secadmin.reqajax,
				function ( oResponse ) {
					if ( oResponse.data.success ) {
						var nLeft = oResponse.data.timeleft;
						nIntervalTimeout = Math.max( 3, (nLeft / 2) ) * 1000;

						if ( !bWarningShown && nLeft < 20 && nLeft > 8 ) {
							bWarningShown = true;
							iCWP_WPSF_Growl.showMessage( icwp_wpsf_vars_secadmin.strings.nearly, false );
						}

						scheduleSecAdminCheck();
					}
					else {
						iCWP_WPSF_BodyOverlay.show();
						setTimeout( function () {
							if ( confirm( icwp_wpsf_vars_secadmin.strings.confirm ) ) {
								window.location.reload( true );
							}
							else {
								iCWP_WPSF_BodyOverlay.hide();
								// Do nothing!
							}
						}, 1500 );
						iCWP_WPSF_Growl.showMessage( icwp_wpsf_vars_secadmin.strings.expired, oResponse.success );
					}

				}
			).always( function () {
				}
			);
		};

		/**
		 */
		var scheduleSecAdminCheck = function () {
			if ( !bCheckInPlace ) {
				setTimeout( function () {
					checkSecAdmin();
				}, nIntervalTimeout );
				bCheckInPlace = true;
			}
		};

		this.initialise = function () {
			jQuery( document ).ready( function () {
				scheduleSecAdminCheck();
			} );
		};
	}();

	iCWP_WPSF_SecurityAdminCheck.initialise();
}