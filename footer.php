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






	var baseUrl = jQuery('body').attr('data-url');

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

				// More details at: http://jquery.malsup.com/block/
				jQuery(document).ajaxStart(jQuery.blockUI).ajaxStop(jQuery.unblockUI);

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
						//jQuery('form[name="login-form"]').submit( formLogin );
					});
					<?php /* Handler for from Registration */ ?>
					jQuery('form[name="register-form"]', function(){
						//jQuery('form[name="register-form"]').submit( formRegister );
					});
				<?php else: ?>
					<?php /* Handler for Logout */ ?>
				<?php endif; ?>
			};

			var ajax = function ( payload, successCallback, errorCallback ) {
				var options = {
					url: baseUrl+'/wp-admin/admin-ajax.php',
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

						console.log("FORM", $form.html());
						
						// Success Callback
						if ( data.error && $form ) { 
							// Checks error from backend
							// TODO: change copy message as needed
							MARCADOR.notify('Algo ocurrió, vuelve a intentarlo.');
							
							$form.find("[type='submit']").removeAttr('disabled');

							console.log("ERROR - ", data );
							return;
						}
						// TODO: Show message?
						// TODO: 2 seconds delay
						// console.log( data );
						if ( data.valid  && $form ) {
							
							console.log("VALID  + ", data)
							MARCADOR.notify('Procesando...');

							window.setTimeout(function() {
								
								if($form.attr("name") == "register-form"){
									
									document.location.href = baseUrl+"/form-success/?ref="+$form.attr("name");
								} else{
									document.location.href = baseUrl+"/perfil/";
								}

								
							}, 5000);
						}
					},
					function (err) { 
						// Error Callback
						// TODO: Show message
						//MARCADOR.notify('Algo ocurrió, vuelve a intentarlo');
						console.log(err);
					}
				);
				return false;
			};
			<?php if ( !is_user_logged_in() ):  ?>
				var formAction 	= function (e) {


					var $form 	= jQuery(e); // Holds the current form
					var payload = formData( $form );
				
					if ( null === payload ) return;
					// TODO: Validate Input on front end

					ajaxAction( $form, payload );
					return false;
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


            jQuery.extend(jQuery.validator.messages, {
            nameFormat: "Por favor introduce un nombre válido.",
            phoneNumber: "Por favor, introduce un número de teléfono válido.",
            cedulaFormat: "Por favor, insertar una cédula valida o pasaporte válido.",
            required: "Este campo es obligatorio. ",
            remote: "Por favor, rellena este campo.",
            email: "Por favor, escribe una dirección de correo válida",
            url: "Por favor, escribe una URL válida.",
            date: "Por favor, escribe una fecha válida.",
            dateISO: "Por favor, escribe una fecha (ISO) válida.",
            number: "Por favor, escribe un número entero válido.",
            digits: "Por favor, escribe sólo dígitos.",
            creditcard: "Por favor, escribe un número de tarjeta válido.",
            equalTo: "Por favor, escribe el mismo valor de nuevo.",
            accept: "Por favor, escribe un valor con una extensión aceptada.",
            maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
            minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
            rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
            range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
            max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
            min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
        });
	


		/*** FORM LOGIN ***/
        var formLogin = jQuery("form[name='login-form']");
        if (formLogin.length > 0) {
            var validator = formLogin.validate({
                meta: "validate",
                errorElement: "span",
                errorClass: "errorField",
                rules: {
                    email: {
                        required: true
                    },
                    password: {
                        required: true,
                        minlength: 3
                    }


                },
               	submitHandler: function(e) {
                	var btnSub = formLogin.find("[type='submit']");
                    btnSub.attr("disabled","disabled").val(btnSub.attr("data-wait"));
                   
                    formAction(e);

                    return false;

                },
                success: function(label, e) {
                    label.addClass("checked");

                }
            });
        }



		/*** FORM REGISTER ***/
        var formForget = jQuery("form[name='forgot-form']");
        if (formForget.length > 0) {
            var validator = formForget.validate({
                meta: "validate",
                errorElement: "span",
                errorClass: "errorField",
                rules: {
                    email: {
                        required: true,
                        email:true
                    }


                },
               	submitHandler: function(e) {
                	var btnSub = formForget.find("[type='submit']");
                    btnSub.attr("disabled","disabled").val(btnSub.attr("data-wait"));
                   
                    //e.submit();
                     formAction(e);
                     return false;

                },
                success: function(label, e) {
                    label.addClass("checked");

                }
            });
        }
        

 		/*** FORM REGISTER ***/
        var formRegister = jQuery("form[name='register-form']");
        if (formRegister.length > 0) {
            var validator = formRegister.validate({
                meta: "validate",
                errorElement: "span",
                errorClass: "errorField",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    username: {
                        required: true,
                        minlength: 3
                    },
                    password: {
                        required: true
                    },
                    passwordConf: {
                        required: true,
                       equalTo: "#passRegisterOne"
                    },


                },
               	submitHandler: function(e) {
                	var btnSub = formRegister.find("[type='submit']");
                    btnSub.attr("disabled","disabled").val(btnSub.attr("data-wait"));
                   
                    formAction(e);
                     return false;

                },
                success: function(label, e) {
                    label.addClass("checked");

                }
            });
        }

/*
		setTimeout(function(){
		  document.location.href = "http://localhost/marcador/proyectoweb/wp/form-success/?ref=register-form";
		},15000);*/

      
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
			MARCADOR.notify('Registrado con éxito. Favor revisar tu correo.');
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
