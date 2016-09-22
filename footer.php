<?php  
/**
 * [footer.php]
 *
 * Footer file
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @author Richard Blondet <richardblondet@gmail.com>
 * @package marcadordo
 */
?>
		</div>
		<?php // <!-- /#page-content-wrapper --> ?>

		<?php /* Right Sidebar */ ?>
		<div id="right-sidebar-wrapper">
			<ul class="sidebar-nav right">
				<li>
					<a href="#">
						<img src="http://placehold.it/50x50&text=M" alt="Equipo" class="img-circle">
					</a>
				</li>
				<li>
					<a href="#">
						<img src="http://placehold.it/50x50&text=M" alt="Equipo" class="img-circle">
					</a>
				</li>
				<li>
					<a href="#">
						<img src="http://placehold.it/50x50&text=M" alt="Equipo" class="img-circle">
					</a>
				</li>
				<li>
					<a href="#">
						<img src="http://placehold.it/50x50&text=M" alt="Equipo" class="img-circle">
					</a>
				</li>
				<li>
					<a href="#">
						<img src="http://placehold.it/50x50&text=M" alt="Equipo" class="img-circle">
					</a>
				</li>
			</ul>
		</div>
		<?php /* End Right Sidebar */ ?>
	</div>
	<?php // <!-- /#wrapper --> ?>
	<?php wp_footer(); ?>
	<script type="text/javascript">
		var MARCADOR = (function( APP ){

			<?php
			/**
			 * Configure the sidebarMenu
			 * file: [sidebar-menu.js]
			 */
			?>
			function setSidebarMenu() {
				var sideMenu = SidebarMenu.getInstance();
				var menuToggleButtons = [
					document.getElementsByClassName("sidebar-bar-close")[0],
					document.getElementsByClassName("navbar-menu-btn")[0]
				];
				<?php /** Add the event to everyone of the provided buttons */ ?>
				[].forEach.call( menuToggleButtons, function(btn){
					btn.onclick = function(e) {
						e.preventDefault();
						if( sideMenu.isOpen() ) {
							sideMenu.close();
						} else {
							sideMenu.open();
						}
					}
				});

				<?php /** Add the close to the `esc` keypress */ ?>
				document.onkeyup = function( e ) {
					var key_number = ( typeof e.which === "number" ) ? e.which : e.keyCode;
					if( key_number === 27 ) {
						if( sideMenu.isOpen() ) {
							sideMenu.close();
						}
					}
				}
			}

			<?php
			/**
			 * Initialize sidebarnav submenu
			 * file: [sidebar-nav-submenu.js]
			 */
			?>
			function setSubmenuSidebar() {
				var elements = document.querySelectorAll('li[sidebar-nav-submenu]');

				new SidebarNav_SubMenu( elements );
			}

			<?php
			/**
			 * Open the sidebar menu and focus the input when clicked
			 * @return {Bool} undefined
			 */
			?>
			function sidebarSearchPatch() {
				var sideMenu = SidebarMenu.getInstance();
				var searchButton = document.querySelector("#sidebar-search-toggle");
				var input = document.querySelectorAll('#sidebar-search-form .form-control')[0];
					
					/** Obey to the clicked event without modifying onclick */
					searchButton.addEventListener('click', function( e ) {
						if(! sideMenu.isOpen() ) {
							sideMenu.open();
							/* always open the search when this clicked */
							searchButton.className = "toggled";
							/** Focus input right away */
							input.focus();
						}
					});
			}

			<?php
			/**
			 * Marcador app initialization part.
			 * @return {obj} Returns the module creation app
			 */
			?>
			APP.init = function() {
				setSidebarMenu();
				setSubmenuSidebar();
				sidebarSearchPatch();
				
				jQuery('li.dropdown.dropdown-lg a').on('click', function (event) {
				    jQuery(this).parent().toggleClass('open');
				});

				<?php /* Handler for modals */ ?>
				<?php if ( !is_user_logged_in() ):  ?>
					jQuery('#registerModal').on('show.bs.modal', function(){ 
						jQuery('#loginModal').modal('hide');
					});
					jQuery('#loginModal').on('show.bs.modal', function(){ 
						jQuery('#registerModal').modal('hide');
						jQuery('#forgotModal').modal('hide');
					});
					jQuery('#forgotModal').on('show.bs.modal', function(){ 
						jQuery('#loginModal').modal('hide');
					});
					<?php /* Handler for from Login */ ?>
					jQuery('form[name="login-form"]', function(){
						jQuery('form[name="login-form"]').submit( formLogin );
					});
					<?php /* Handler for from Registration */ ?>
					jQuery('form[name="register-form"]', function(){
						jQuery('form[name="register-form"]').submit( formRegister );
					});
				<?php else: ?>
					<?php /* Handler for Logout */ ?>
				<?php endif; ?>
			};

			var ajax = function ( payload, successCallback, errorCallback ) {
				var options = {
					url: '/wp-admin/admin-ajax.php',
					type: 'post',
					dataType: 'json',
					data: payload
				};
				if (successCallback !== null && successCallback !== undefined) options.success = successCallback;
				if (errorCallback !== null && errorCallback !== undefined) options.error = errorCallback;
				// Returns the deferred object, needed for chaining requests
				return jQuery.ajax(options);
			};

			var ajaxAction = function ( $form, payload ) {
				
				if ( $form ) {
					var referer 		= $form.find("input[name='_wp_http_referer']").val();
					payload._wpnonce 	= $form.find("input[name='_wpnonce']").val();
				}

				ajax(
					payload,
					function ( data ) { 
						// Success Callback
						if ( data.error ) { 
							// Checks error from backend
							// TODO: change copy message as needed
							MARCADOR.notify('Algo ocurrió, vuelve a intentarlo');
							console.log( data );
							return;
						}
						// TODO: Show message?
						// TODO: 2 seconds delay
						// console.log( data );
						if ( data.valid ) {
							window.setTimeout(function() {
								document.location.href = referer;
							}, 5000);
						}
					},
					function (err) { 
						// Error Callback
						// TODO: Show message
						MARCADOR.notify('Algo ocurrió, vuelve a intentarlo');
						console.log(err);
					}
				);
			};
			<?php if ( !is_user_logged_in() ):  ?>
				var formAction 	= function (e) {
					var $form 	= jQuery(e.target); // Holds the current form
					var payload = formData( $form );

					if ( null === payload ) return;
					// TODO: Validate Input on front end

					ajaxAction( $form, payload );
					e.preventDefault();
				};

				var formData = function ( $form ) {
					var payload;
					if ( "login-form" === $form.attr("name") ) {
						payload = {
							action	: 'marcador_login',
							username: $form.find("input[name='username']").val(),
							password: $form.find("input[name='password']").val()
						};
					} else if ( "register-form" === $form.attr("name") ) {
						payload = {
							action	: 'marcador_register',
							email 	: $form.find("input[name='email']").val(),
							username: $form.find("input[name='username']").val(),
							password: $form.find("input[name='password']").val()
						};
					} else {
						payload = null;
					}

					return payload;
				};

				var formLogin 	 = function (e) { formAction(e); };
				var formRegister = function (e) { formAction(e); };

				APP.googleLogin  = function ( payload ) {
					$form = jQuery("form[name='login-form']");
					ajaxAction($form , payload);
				};
				APP.googleRegister 	= function ( payload ) {
					$form = jQuery("form[name='register-form']");
					ajaxAction($form, payload);
				};
				
				APP.facebookLogin 	= function ( payload ) {
					$form = jQuery("form[name='login-form']");
					ajaxAction($form , payload);
				};
				APP.facebookRegister = function ( payload ) {
					$form = jQuery("form[name='register-form']");
					ajaxAction($form, payload);
				};
			<?php else: ?>
				APP.logout = function (e) {
					e.preventDefault();
					payload = { action: 'marcador_logout' };
					APP.ajaxAction( null, payload );
					document.location.href = "/";
				};
			<?php endif; ?>
			APP.notify = function( message, displayLength, className, completeCallback ) {
				marcadorToastr( message, displayLength, className, completeCallback )
			}
			APP.ajax = ajax;

			return APP;
		
		}( MARCADOR || {} ));
		
		<?php
		/**
		 * On document ready
		 */
		?>
		jQuery( document ).ready( MARCADOR.init );
	</script>

	<?php if ( !is_user_logged_in() ): // Facebook Integration ?>
	<!-- <div id="fb-root"></div> -->
	<script type="text/javascript">
		
	function statusChangeCallback( response, cb ) {
	    if ( response.status === 'connected' ) {
	     	// Logged into your app and Facebook.
	     	performFBLoggin( response.authResponse, cb );
	    
	    } else if ( response.status === 'not_authorized' ) {
	     	// The person is logged into Facebook, but not your app.
	     	// console.log( 'Please log into this app.' );
	      	FB.login(function( response ) {
	    		if( response.authResponse ) {
	    			performFBLoggin( response.authResponse, MARCADOR.facebookLogin );
	    		} 
	    		else {
	    			// console.log("USER CANCELLED");
	    			MARCADOR.notify('Solicitud cancelada...');
	    		}
	    	}, { auth_type: 'reauthenticate', scope: 'email' });
	    } else {
	    	// The person is not logged into Facebook, so we're not sure if
	    	// they are logged into this app or not.
	    	FB.login(function( response ) {
	    		if( response.authResponse ) {
	    			performFBLoggin( response.authResponse, MARCADOR.facebookLogin );
	    		} 
	    		else {
	    			// console.log("USER CANCELLED");
	    			MARCADOR.notify('Solicitud cancelada...');
	    		}
	    	}, { scope: 'email' });
	    }
	}

	function checkLoginState() {
		FB.getLoginStatus(function(response) {
			console.log("Checking log in response", response);
			statusChangeCallback( response, MARCADOR.facebookLogin );
		});
	}

	function checkRegisterState () {
		FB.getLoginStatus(function(response) {
			console.log("Checking register response", response);
			statusChangeCallback( response, MARCADOR.facebookRegister );
		});
	}

	function performFBLoggin( auth, cb ) {
	    
	    FB.api(
	    	'/me', {
		    	fields: 'name,email,cover',
		    }, 
		    function( response ) {
	    		var action = ( MARCADOR.facebookLogin === cb ) ? 'login' : 'register' ; 

	    		console.log("performFBLoggin response: ", response);
		    	
		    	payload = {
					action: 'marcador_facebook_' + action,
		    		// image_url: response.cover,
		    		auth: auth.signedRequest,
		    		auth_type: "facebook"
		    	};

		    	if (action === 'login') payload.username = response.email;
				else {
					payload.name = response.name;
					payload.email = response.email;
					payload.username = response.email;
				}
		    	
		    	cb(payload);
	    	}
	    );
	}
	</script>
	<?php endif; ?>

	<?php if ( !is_user_logged_in() ): // Google Integration ?>
	<script type="text/javascript">
		function onSuccessGoogleLogin ( googleUser ) {
		  var profile = googleUser.getBasicProfile();
		  var authResponse = googleUser.getAuthResponse();
		  var payload = {
				action: 'marcador_google_login',
				username: profile.getEmail(),
				auth: authResponse.id_token,
				auth_type: "google"
			};

		  MARCADOR.googleLogin( payload );
		}

	    function onFailureGoogle ( error ) {
	      console.log(error);
	    }
		function onSuccessGoogleRegister ( googleUser ) {
		  var profile = googleUser.getBasicProfile();
		  var authResponse = googleUser.getAuthResponse();
		  var payload = {
				action: 'marcador_google_register',
				name: profile.getName(),
				email: profile.getEmail(),
				//image_url: profile.getImageUrl(),
				auth: authResponse.id_token,
				auth_type: "google"
			};

		  MARCADOR.googleRegister(payload);
		}

    function renderGoogleButton () {
      gapi.signin2.render('marcador-g-signin2', {
        'scope': 'profile email',
        'width': 237,
        'height': 36,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccessGoogleLogin,
        'onfailure': onFailureGoogle
      });

      gapi.signin2.render('marcador-g-signup2', {
        'scope': 'profile email',
        'width': 237,
        'height': 36,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccessGoogleRegister,
        'onfailure': onFailureGoogle
      });
    }
	</script>
	<script src="https://apis.google.com/js/platform.js?onload=renderGoogleButton" async defer></script>
	<?php endif; ?>
	</body><!-- /body -->
</html><!-- /html -->
