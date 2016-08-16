<?php  
/**
 * [header.php] - Document Head
 *
 * @link(blank, https://codex.wordpress.org/Theme_Development#Document_Head_.28header.php.29)
 * @author Richard Blondet <richardblondet@gmail.com>
 * @package marcadordo
 * 
 */

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
-->\n
AUTHORS;

/**
 * Header Settings for Marcador customizers
 */
$logo_customizer = get_option( 'marcador_logo_setting_handler', get_template_directory_uri() . '/assets/imgs/logo.png' );

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php printf($authors); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	
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
							<i class="material-icons md-light md-24">motorcycle</i>
						</span>
						<span class="sidebar-menu-item">Deportes</span>
					</a> 
					<ul class="sidebar-nav-submenu">
						<li><a href="#besibol">Beisbol</a></li>
						<li><a href="#baloncesto">Baloncesto</a></li>
						<li><a href="#futbol">Futbol</a></li>
						<li><a href="#boxeo">Boxeo</a></li>
						<li><a href="#voleibol">Voleibol</a></li>
						<li><a href="#nascar">Nascar</a></li>
						<li><a href="#nfl">NFL</a></li>
						<li><a href="#tenis">Tenis</a></li>
					</ul>
				</li>
				<li>
					<a href="#">
						<span class="sidebar-icon">
							<i class="material-icons md-light md-24">play_circle_outline</i>
						</span>
						<span class="sidebar-menu-item">Videos</span>
					</a> 
				</li>
				<li>
					<a href="#">
						<span class="sidebar-icon">
							<i class="material-icons md-light md-24">star</i>
						</span>
						<span class="sidebar-menu-item">Favoritos</span>
					</a> 
				</li>
				<li>
					<a href="#" class="sidebar-show-more">
						<span class="sidebar-icon">
							<i class="material-icons md-light md-24">more_horiz</i>
						</span>
						<span class="sidebar-menu-item">Más</span>
					</a> 
				</li>
			</ul>
			<ul id="social" class="sidebar-nav">
				<li>
					<a href="#facebook"><span class="marcador-icon facebook"></span></a>
				</li>
				<li>
					<a href="#twitter"><span class="marcador-icon twitter"></span></a>
				</li>
				<li>
					<a href="#rss"><span class="marcador-icon rss"></span></a>
				</li>
				<li>
					<a href="#linkedin"><span class="marcador-icon linkedin"></span></a>
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
							<?php /* <!-- Not logged user 
							<li>
								<a href="#">
									<i class="material-icons md-light">person</i>
								</a>
							</li> 
							*/ ?>
							<?php /* --> */ ?>
							<?php /* <!-- END OF Not logged user --> */ ?>
							<?php /* <!-- Logged user --> */ ?>
							<li class="logged-in">
								<a href="#userprofile">
									<img src="http://placehold.it/50x50&text=IMG" alt="USER_NAME">
								</a>
							</li>
							<?php /* <!-- END OF Logged user --> */ ?>
							<li>
								<a href="#score">Score</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<?php /* <!-- /.navbar-marcador --> */ ?>
			
			
			
		