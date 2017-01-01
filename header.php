<?php  
/**
 * [header.php] - Document Head
 *
 * @link(blank, https://codex.wordpress.org/Theme_Development#Document_Head_.28header.php.29)
 * @author Richard Blondet <richardblondet@gmail.com>
 * @package marcadordo
 * 
 */
global $user_admin_name;
$authors = <<<AUTHORS
<!--
*|==============================
*| Design:
*|  Yuriko Sone
*|  yurikosone@gmail.com
*|
*| Frontend Development: 
*|  Richard Blondet 
*|  richardblondet@gmail.com
*|
*| Backend Development:
*|  Ronnie Baez
*|  ronnie.baez@gmail.com
*|==============================
-->
AUTHORS;

/**
 * Header Settings for Marcador customizers
 */
$logo_customizer = get_option( 'marcador_logo_setting_handler', get_template_directory_uri() . '/assets/imgs/logo.png' );

function banner() {
	echo '<div style="background-color: #ccc; width: 100%; height: 210px; background-image: url(\'http://placehold.it/300x210&text=Anunciate+Aqui\'); background-size: cover; background-position: center; background-repeat: no-repeat;""></div>';
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php printf($authors); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="google-signin-client_id" content="465680398170-fk6tnqqmhleqffjpp5e58u5r3tgipjk1.apps.googleusercontent.com">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> data-url='<?php echo get_site_url(); ?>'>
	<script>
	  window.fbAsyncInit = function() {
		  FB.init({
		    appId   : '283126788739195',
		    cookie  : true,
		    xfbml   : true,
		    version : 'v2.5',
		    oauth   : true,
	        // status  : true,	// check login status
	        cookie  : true,	// enable cookies to allow the server to access the session
	        xfbml   : true 	// parse XFBML
		  });
	  };

	  // Load the SDK asynchronously
	  (function(d, s, id) {
	    var js, fjs = d.getElementsByTagName(s)[0];
	    if (d.getElementById(id)) return;
	    js = d.createElement(s); js.id = id;
	    js.src = "//connect.facebook.net/en_US/sdk.js";
	    fjs.parentNode.insertBefore(js, fjs);
	  }(document, 'script', 'facebook-jssdk'));
	</script>

	<?php if ( !is_user_logged_in() ):  ?>
		<?php /* <!-- Register Modal --> */ ?>
		<div class="modal fade marcador-modal" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel"><?php echo __('registrarse', 'marcadordo'); ?></h4>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-6 col-md-6 modal-col">
									<div class="marcador-modal-form">
										<form name="register-form"  method="post">
											<div class="form-group">
												<input name="email" type="email" placeholder="<?php echo __('Correo Electrónico', 'marcadordo'); ?>" class="form-control modal-input">
											</div>
											<div class="form-group">
												<input name="username" type="text" placeholder="<?php echo __('Usuario', 'marcadordo'); ?>" class="form-control modal-input">
											</div>
											<div class="form-group">
											<i class="fa fa-eye showHidePass trans-3" data-passID = 'passRegisterOne' aria-hidden="true"></i>				

												<input name="password" type="password" id="passRegisterOne" placeholder="<?php echo __('Contraseña', 'marcadordo'); ?>" class="form-control modal-input">
											</div>
											<div class="form-group">
											<i class="fa fa-eye showHidePass trans-3" data-passID = 'passRegisterTwo' aria-hidden="true"></i>				

												<input name="passwordConf" type="password" id="passRegisterTwo" placeholder="<?php echo __('Confirmar Contraseña', 'marcadordo'); ?>" class="form-control modal-input">
											</div>
											<div class="form-group">
												<button class="btn btn-danger btn-submit btn-block" data-wait="<?php _e("Procesando...") ?>"  type="submit">
													<?php echo __( 'Registrarse', 'marcadordo' ) ?>
												</button>
											</div>
											<?php wp_nonce_field( 'marcador_ajax_register' ); ?>
											<div class="form-group">
												<p class="modal-form-copy text-center">
													<?php echo __( 'Al registrarte aceptas nuestras políticas de privacidad', 'marcadordo' ); ?>
												</p>
											</div>
											<div class="form-group">
												<p class="modal-form-copy text-center">
													<strong><?php echo __( '¿Ya tienes una cuenta en Marcador.do?', 'marcadordo' ); ?></strong>
													<a href="#" class="btn btn-link" data-toggle="modal" data-target="#loginModal">
														<?php echo __( 'Entra', 'marcadordo' ); ?>
													</a>
												</p>
											</div>
										</form>
									</div> 
								</div>
								<div class="col-sm-6 col-md-6">
									<div class="marcador-modal-form">
										<div class="form-group">
											<div id="marcador-g-signup2"></div>
											<?php /*<a href="#google-handler" class="btn btn-danger btn-block google">
												<?php echo __( 'Conéctate con Google', 'marcadordo' ); ?>
											</a> */ ?>
										</div>
										<div class="form-group">
											<!-- <fb:login-button scope="public_profile,email" onlogin="checkRegisterState();"></fb:login-button> -->
											<a href="javascript:checkRegisterState()" class="btn btn-danger btn-block facebook">
												<?php echo __( 'Conéctate con Facebook', 'marcadordo' ); ?>
											</a>
										</div>
										<div class="form-group">
											<hr>
										</div>
										<div class="form-group">
											<?php banner(); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php /* <!-- ./Register Modal --> */ ?>

		<?php /* <!-- Login Modal --> */ ?>
		<div class="modal fade marcador-modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel"><?php echo __('acceder', 'marcadordo'); ?></h4>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-6 col-md-6 modal-col">
									<div class="marcador-modal-form">
										<form name="login-form"  method="post">
											<div class="form-group">
												<input name="username" type="text" placeholder="<?php echo __('Nombre de Usuario o Correo Electrónico', 'marcadordo'); ?>" class="form-control modal-input">
											</div>
											<div class="form-group">
												<i class="fa fa-eye showHidePass trans-3" data-passID = 'passLogin' aria-hidden="true"></i>				

												<input name="password" id='passLogin' type="password" placeholder="<?php echo __('Contraseña', 'marcadordo'); ?>" class="form-control modal-input">
											</div>
											<div class="form-group">
												<button class="btn btn-danger btn-block" type="submit">
													<?php echo __( 'Acceder', 'marcadordo' ) ?>
												</button>
											</div>
											<div class="form-group">
												<p class="modal-form-copy text-center">

													<a href="#" data-toggle="modal" data-target="#forgotModal"><?php _e("¿Olvidaste tu contraseña?"); ?></a>
													
												</p>
											</div>
											<?php wp_nonce_field( 'marcador_ajax_login' ); ?>
										</form>
									</div> 
								</div>
								<div class="col-sm-6 col-md-6">
									<div class="marcador-modal-form">
										<div class="form-group">
											<p class="modal-form-copy text-center">
												<?php echo __( '¿Aún no tienes una cuenta de Marcador.do?', 'marcadordo' ); ?>
												<br>
												<?php echo __( 'Créala aquí completamente gratis.', 'marcadordo' ); ?>
											</p>
											<a href="#" class="btn btn-default btn-block marcador-special close-login" data-toggle="modal" data-target="#registerModal">
												<?php echo __( 'Crear una Cuenta', 'marcadordo' ); ?>
											</a>
										</div>
										<div class="form-group">
											<hr>
										</div>
										<div class="form-group">
											<div id="marcador-g-signin2"></div>
											<?php /*<a href="#google-handler" class="btn btn-danger btn-block google">
												<?php echo __( 'Conéctate con Google', 'marcadordo' ); ?>
											</a>*/?>
										</div>
										<div class="form-group">
											<?php /* <fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button> */ ?>

											<a href="javascript:checkLoginState()" class="btn btn-danger btn-block facebook">
												<?php echo __( 'Conéctate con Facebook', 'marcadordo' ); ?>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php /* <!-- ./Login Modal --> */ ?>

		<?php /* <!-- Password Forgot Modal */ ?>
		<div class="modal fade marcador-modal" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="forgotModalLabel">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel"><?php echo __('recuperar contraseña', 'marcadordo'); ?></h4>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 modal-col">
									<div class="marcador-modal-form">
										<form name="forgot-form" method="post">
											<div class="form-group">
												<input type="email" name="email" placeholder="<?php echo __('Inserta tu correo electrónico', 'marcadordo'); ?>" class="form-control modal-input">
											</div>
											<div class="form-group">
												<button class="btn btn-danger btn-block" type="submit">
													<?php echo __( 'Recuperar', 'marcadordo' ); ?>
												</button>
											</div>
											<div class="form-group">
												<p class="modal-form-copy text-center">
													<a href="#" data-toggle="modal" data-target="#loginModal"><?php echo __( 'Cancelar e Iniciar sesión', 'marcadordo' ); ?></a>
												</p>
											</div>
										</form>
									</div> 
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php /* <!-- ./Password Forgot Modal */ ?>
	<?php endif; ?>

	<?php /* <!-- Wrapper --> */ ?>
	<div id="wrapper" class="<?php if( is_search()){ echo "toggled"; } ?>">
		
		<?php /* <!-- Sidebar --> */ ?>
		<div id="sidebar-wrapper">
			<ul class="sidebar-nav">
				<li>
					<a href="#" class="sidebar-bar-close">
						<span class="sidebar-icon">
							<i class="material-icons md-light md-24 close-mc">close</i>
							<i class="material-icons md-light md-24 menu-mc">menu</i>
						</span>
					</a> 
				</li>
				<li id="sidebar-search-toggle" sidebar-nav-submenu class="<?php if( is_search()){ echo "toggled"; } ?>">
					<a href="#buscar"> 
						<span class="sidebar-icon">
							<i class="material-icons md-light md-24">search</i>
						</span>
						<span class="sidebar-menu-item">
							Buscar
						</span>
					</a>
					<ul class="sidebar-nav-submenu">
						<li>
							<?php /* <!-- Sidebar Search Form --> */ ?>
							<div id="sidebar-search-form">
								<form action="/" method="get">
									<div class="row">
										<div class="col-xs-9">
											<input type="text" class="form-control input-lg" name="s" <?php if( get_search_query() ):  ?> value="<?php echo get_search_query(); ?>" <?php endif; ?>>
										</div>
										<div class="col-xs-3">
											<button type="submit" class="btn btn-search btn-block btn-lg">
												<i class="material-icons md-light md-24">search</i>
											</button>
										</div>
									</div>
								</form>
							</div>
							<?php /* <!-- #Sidebar Search Form --> */ ?>
						</li>
					</ul>
				</li>		
				<li sidebar-nav-submenu class>
					<a href="#" class="">
						<span class="sidebar-icon">
							<i class="tennis-ball" ></i>
						</span>
						<span class="sidebar-menu-item">Deportes</span>
					</a> 
					<?php 
						if ( has_nav_menu( 'primary' ) ) {
						 /**
							* Displays a navigation menu
							* @param array $args Arguments
							*/
							$args = array(
								'theme_location' => 'primary',
								'container' => '',
								'menu_class' => 'sidebar-nav-submenu',
							);
							wp_nav_menu( $args );
						}
					?>
				</li>
				<li sidebar-nav-submenu class>
					<a href="#" class="">
						<span class="sidebar-icon">
							<i class="material-icons md-light md-24">play_circle_outline</i>
						</span>
						<span class="sidebar-menu-item">Videos</span>
					</a> 
					<?php do_action('add_menu_marcador_video'); ?>
				</li>
				<?php if(is_user_logged_in() === true): ?>
				<li>
					<a href="<?php echo get_site_url(); ?>/favoritos">
						<span class="sidebar-icon">
							<i class="material-icons md-light md-24">star</i>
						</span>
						<span class="sidebar-menu-item">Favoritos</span>
					</a> 
				</li>
			<?php endif; ?>
				<li sidebar-nav-submenu class>
					<a href="#" class="sidebar-show-more">
						<span class="sidebar-icon">
							<i class="material-icons md-light md-24">more_horiz</i>
						</span>
						<span class="sidebar-menu-item">Más</span>
					</a> 
					<?php do_action('add_menu_marcador_mas'); ?>
				</li>
			</ul>
			<ul id="social" class="sidebar-nav">
				<li>
					<a href="https://www.facebook.com/Marcador.do/"><span class="marcador-icon facebook"></span></a>
				</li>
				<li>
					<a href="https://twitter.com/Marcador_Do"><span class="marcador-icon twitter"></span></a>
				</li>
				<li>
					<a href="https://www.instagram.com/marcador.do/"><span class="marcador-icon instagram"></span></a>
				</li>
				<li>
					<a href="#rss"><span class="marcador-icon rss"></span></a>
				</li>
			</ul>
			<div id="marcador-ref-links">
				<ul>
					<li><a href="#contacto">Contacto</a></li>
					<li><a href="#quienes-somos">Quienes Somos</a></li>
				</ul>
			</div>
			<div id="marcador-legal-copy">
				<div>
					Copyright &copy; 2016 &mdash; Marcador.do &mdash; <br> Todos los derechos reservados
				</div>
			</div>
		</div>
		<?php /* <!-- /#sidebar-wrapper --> */ ?>

		<?php /* <!-- Page Content --> */ ?>
		<div id="page-content-wrapper">
			<?php /* <!-- Navbar --> */ ?>
			<nav class="navbar navbar-default navbar-static-top navbar-marcador">
				<div class="container-fluid">
					<div class="navbar-header pull-left">
						<a href="#" class="navbar-brand navbar-menu-btn">
							<i class="material-icons md-light">menu</i>
						</a>
						<a class="navbar-brand" href="<?php echo home_url();?>">
							<img id="logo" src="<?php echo $logo_customizer; ?>" height="24" width="130" alt="logo">
						</a>
					</div>
					<div class="navbar-header pull-right">
						<ul class="nav pull-left">
							<?php if ( !is_user_logged_in() ):  ?>
							 <?php /* <!-- Not logged user  --> */ ?>
							<li>
								<a href="#" data-toggle="modal" data-target="#loginModal">
									<i class="material-icons md-light">person</i>
								</a>
							</li>
							<?php else: /* <!-- Logged user --> */ ?>
							<?php /* <!-- END OF Not logged user --> */ ?>
							<li class="logged-in">
								<a href="javascript:;">
									<?php echo get_avatar( get_current_user_id(), $size = 40); ?>
								</a>
								<ul class="drop-user-profile">
									<li><a class="trans-3" href="<?php echo get_site_url()."/perfil"?>"><?php _e("Mi Perfil", $common_domain); ?></a></li>
									<li><a class="trans-3" href="<?php echo get_site_url()."/mis-equipos"?>"><?php _e("Mis Equipos", $common_domain); ?></a></li>
									<li><a class="trans-3" href="<?php echo get_admin_url(); ?>/post-new.php" target="_blank"><?php _e("Redactar un post", $common_domain); ?></a></li>									
									<li><a class="trans-3" href="<?php echo wp_logout_url(home_url()); ?>"><?php _e("Cerrar Sesión", $common_domain); ?></a></li>
								</ul>
							</li>
							<?php endif; ?>
							<li class="dropdown dropdown-lg">
								<a href="#score" class="dropdown-toggle">Score</a>

								<ul class="dropdown-menu dropdown-menu-lg row">
									<li class="col-xs-12">
										<select name="liga" id="score-liga-selector" class="form-control">
											<option>— SELECCIONA —</option>
										</select>
									</li>
									<li class="col-xs-12">
										<div class="row row-game text-center">
											<div class="col-xs-4">
												<p class="dropdown field team home">
													<span class="dropdown field image home"><img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/mlb/TEX-logo-sm.png" height="20" width="20" alt=""></span>&nbsp;&nbsp;
													<span class="dropdown field name home">TEAM_A</span>&nbsp;&nbsp;&nbsp;
												</p>
												<p class="dropdown field team away">
													<span class="span dropdown field image away"><img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/mlb/TEX-logo-sm.png" height="20" width="20" alt=""></span>&nbsp;&nbsp;
													<span class="dropdown field name away">TEAM_B</span>&nbsp;&nbsp;&nbsp;
												</p>
											</div>
											<div class="col-xs-4">
												<p class="dropdown field team home">
													<span class="dropdown field score home">SCORE_A</span>
												</p>
												<p class="dropdown field team away">
													<span class="dropdown field score away">SCORE_B</span>
												</p>
											</div>
											<div class="col-xs-4">
												<p class="dropdown status">
													Final
												</p>
											</div>
										</div>
										<div class="row row-game text-center">
											<div class="col-xs-4">
												<p class="dropdown field team home">
													<span class="dropdown field image home"><img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/mlb/TEX-logo-sm.png" height="20" width="20" alt=""></span>&nbsp;&nbsp;
													<span class="dropdown field name home">TEAM_A</span>&nbsp;&nbsp;&nbsp;
												</p>
												<p class="dropdown field team away">
													<span class="span dropdown field image away"><img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/mlb/TEX-logo-sm.png" height="20" width="20" alt=""></span>&nbsp;&nbsp;
													<span class="dropdown field name away">TEAM_B</span>&nbsp;&nbsp;&nbsp;
												</p>
											</div>
											<div class="col-xs-4">
												<p class="dropdown field team home">
													<span class="dropdown field score home">SCORE_A</span>
												</p>
												<p class="dropdown field team away">
													<span class="dropdown field score away">SCORE_B</span>
												</p>
											</div>
											<div class="col-xs-4">
												<p class="dropdown status">
													Final
												</p>
											</div>
										</div>
										<div class="row row-game text-center">
											<div class="col-xs-4">
												<p class="dropdown field team home">
													<span class="dropdown field image home"><img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/mlb/TEX-logo-sm.png" height="20" width="20" alt=""></span>&nbsp;&nbsp;
													<span class="dropdown field name home">TEAM_A</span>&nbsp;&nbsp;&nbsp;
												</p>
												<p class="dropdown field team away">
													<span class="span dropdown field image away"><img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/mlb/TEX-logo-sm.png" height="20" width="20" alt=""></span>&nbsp;&nbsp;
													<span class="dropdown field name away">TEAM_B</span>&nbsp;&nbsp;&nbsp;
												</p>
											</div>
											<div class="col-xs-4">
												<p class="dropdown field team home">
													<span class="dropdown field score home">SCORE_A</span>
												</p>
												<p class="dropdown field team away">
													<span class="dropdown field score away">SCORE_B</span>
												</p>
											</div>
											<div class="col-xs-4">
												<p class="dropdown status">
													Final
												</p>
											</div>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<?php /* <!-- /.navbar-marcador --> */ ?>
			
			
			
		
