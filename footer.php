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
		<!-- /#page-content-wrapper -->
	</div>
	<!-- /#wrapper -->
	<?php wp_footer(); ?>
	<script type="text/javascript">
		//var init;
		var MARCADOR = (function(APP){

			/**
			 * Configure the sidebarMenu
			 * file: [sidebar-menu.js]
			 */
			function setSidebarMenu() {
				var sideMenu = SidebarMenu.getInstance();
				var menuToggleButtons = [
					document.getElementsByClassName("sidebar-bar-close")[0],
					document.getElementsByClassName("navbar-menu-btn")[0]
				];
				/** Add the event to everyone of the provided buttons */
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

				/** Add the close to the `esc` keypress */
				document.onkeyup = function( e ) {
					var key_number = ( typeof e.which === "number" ) ? e.which : e.keyCode;
					if( key_number === 27 ) {
						if( sideMenu.isOpen() ) {
							sideMenu.close();
						}
					}
				}
			}

			/**
			 * Initialize sidebarnav submenu
			 * file: [sidebar-nav-submenu.js]
			 */
			function setSubmenuSidebar() {
				var elements = document.querySelectorAll('li[sidebar-nav-submenu]');

				new SidebarNav_SubMenu( elements );
			}

			/**
			 * Open the sidebar menu and focus the input when clicked
			 * @return {Bool} undefined
			 */
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

			APP.init = function() {
				setSidebarMenu();
				setSubmenuSidebar();
				sidebarSearchPatch();

				<?php if ( !is_user_logged_in() ):  ?>
					<?php /* Handler for modals */ ?>
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
						jQuery('form[name="login-form"]').submit(formLogin);
					});
					<?php /* Handler for from Registration */ ?>
					jQuery('form[name="register-form"]', function(){
						jQuery('form[name="register-form"]').submit(formRegister);
					});
				<?php else: ?>
					<?php /* Handler for Logout */ ?>
				<?php endif; ?>
			};

			var ajax = function (payload, successCallback, errorCallback) {
				console.log(payload);
				jQuery.ajax({
					url: '/wp-admin/admin-ajax.php',
					type: 'post',
					dataType: 'json',
					data: payload,
					success: successCallback,
					error: errorCallback
				});
			};

			var ajaxAction = function ( $form, payload ) {
				if ($form) {
					var referer = $form.find("input[name='_wp_http_referer']").val();
					payload._wpnonce 	= $form.find("input[name='_wpnonce']").val();
				}

				ajax(
					payload,
					function (data) { // Success Callback
						if (data.error) { // Checks error from backend
							// TODO: Show error message.
							console.log(data);
							return;
						}
						// TODO: Show message?
						// TODO: 2 seconds delay
						console.log(data);
						if (data.valid) {
							window.setTimeout(function() {
								document.location.href = referer;
							}, 5000);
						}
					},
					function (err) { // Error Callback
						// TODO: Show message
						console.log(err);
					}
				);
			};

			<?php if ( !is_user_logged_in() ):  ?>
			var formAction 	= function (e) {
				var $form 		= jQuery(e.target); // Holds the current form

				var payload 	= formData($form);
				if (null === payload) return;
				// TODO: Validate Input on front end

				ajaxAction($form, payload);
				e.preventDefault();
			};

			var formData = function ($form) {
				var payload;
				if ("login-form" === $form.attr("name")) {
					payload = {
						action	: 'marcador_login',
						username: $form.find("input[name='username']").val(),
						password: $form.find("input[name='password']").val()
					};
				} else if ("register-form" === $form.attr("name")) {
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

			var formLogin = function (e) { formAction(e); };
			var formRegister = function (e) { formAction(e); };

			APP.googleLogin 		= function (payload) {
				$form = jQuery("form[name='login-form']");
				ajaxAction($form , payload);
			};
			APP.googleRegister 	= function (payload) {
				$form = jQuery("form[name='register-form']");
				ajaxAction($form, payload);
			};
			
			APP.facebookLogin 		= function (payload) {
				$form = jQuery("form[name='login-form']");
				ajaxAction($form , payload);
			};
			APP.facebookRegister 	= function (payload) {
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
			/** @type {function} triggers on page load */
			//page.onload = init;
			return APP;
		
		}(MARCADOR || {}));
		window.onload = MARCADOR.init
	</script>

	<?php if ( !is_user_logged_in() ): // Facebook Integration ?>
	<script type="text/javascript">
	  function statusChangeCallback(response, cb) {
	    if (response.status === 'connected') {
	      // Logged into your app and Facebook.
	      testAPI(response.authResponse, cb);
	    } else if (response.status === 'not_authorized') {
	      // The person is logged into Facebook, but not your app.
	      console.log( 'Please log into this app.' );
	      // TODO: Show message to authorize app.
	    } else {
	      // The person is not logged into Facebook, so we're not sure if
	      // they are logged into this app or not.
	      console.log( 'Please log into Facebook.' );
	      // TODO: Show message to log into facebook.
	    }
	  }

	  function checkLoginState() {
	    FB.getLoginStatus(function(response) {
	      statusChangeCallback(response, MARCADOR.facebookLogin);
	    });
	  }

	  function checkRegisterState () {
	    FB.getLoginStatus(function(response) {
	      statusChangeCallback(response, MARCADOR.facebookRegister);
	    });
	  }

	  function testAPI(auth, cb) {
	    FB.api('/me', {fields: 'name,email,cover'}, function(response) {
	    	var action = (MARCADOR.facebookLogin === cb)?'login':'register';
	    	payload = {
					action: 'marcador_facebook_' + action,
	    		name: response.name,
	    		email: response.email,
	    		// image_url: response.cover,
	    		auth: auth
	    	};
	    	cb(payload);
	    });
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
				email: profile.getEmail(),
				auth: authResponse
			};

		  MARCADOR.googleLogin(payload);
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
				auth: authResponse
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
