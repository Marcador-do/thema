<!DOCTYPE html>
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
*| 	Yuriko Sone
*|  yurikosone@gmail.com
*|
*| Frontend Development: 
*| 	Richard Blondet 
*| 	richardblondet@gmail.com
*|
*| Backend Development:
*| 	Ronny Baez
*|  ronnie.baez@gmail.com
*|==============================
-->\n
AUTHORS;
?>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<?php printf($authors); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    
	<title><?php if ( is_category() ) {
	      echo 'Category Archive for &quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
	    } elseif ( is_tag() ) {
	      echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
	    } elseif ( is_archive() ) {
	      wp_title(''); echo ' Archive | '; bloginfo( 'name' );
	    } elseif ( is_search() ) {
	      echo 'Search for &quot;'.esc_html($s).'&quot; | '; bloginfo( 'name' );
	    } elseif ( is_home() || is_front_page() ) {
	      bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
	    }  elseif ( is_404() ) {
	      echo 'Error 404 Not Found | '; bloginfo( 'name' );
	    } elseif ( is_single() ) {
	      wp_title('');
	    } else {
	      echo wp_title( ' | ', 'false', 'right' ); bloginfo( 'name' );
	} ?></title>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- Wrapper -->
<div id="wrapper" class="">
	
	<!-- Sidebar -->
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
			<li>
				<a href="#buscar"> 
					<span class="sidebar-icon">
						<i class="material-icons md-light md-24">search</i>
					</span>
					<span class="sidebar-menu-item">
						Buscar
					</span>
				</a> 
			</li>
			<li sidebar-nav-submenu class>
				<a href="#" class="">
					<span class="sidebar-icon">
						<i class="material-icons md-light md-24">motorcycle</i>
					</span>
					<span class="sidebar-menu-item">
						Deportes
					</span>
				</a> 
				<ul class="sidebar-nav-submenu">
					<li>
						<a href="#besibol">Beisbol</a>
					</li>
					<li>
						<a href="#baloncesto">Baloncesto</a>
					</li>
					<li>
						<a href="#futbol">Futbol</a>
					</li>
					<li>
						<a href="#boxeo">Boxeo</a>
					</li>
					<li>
						<a href="#voleibol">Voleibol</a>
					</li>
					<li>
						<a href="#nascar">Nascar</a>
					</li>
					<li>
						<a href="#nfl">NFL</a>
					</li>
					<li>
						<a href="#tenis">Tenis</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#">
					<span class="sidebar-icon">
						<i class="material-icons md-light md-24">play_circle_outline</i>
					</span>
					<span class="sidebar-menu-item">
						Videos
					</span>
				</a> 
			</li>
			<li>
				<a href="#">
					<span class="sidebar-icon">
						<i class="material-icons md-light md-24">star</i>
					</span>
					<span class="sidebar-menu-item">
						Favoritos
					</span>
				</a> 
			</li>
			<li>
				<a href="#" class="sidebar-show-more">
					<span class="sidebar-icon">
						<i class="material-icons md-light md-24">more_horiz</i>
					</span>
					<span class="sidebar-menu-item">
						Más
					</span>
				</a> 
			</li>
		</ul>
	</div>
	<!-- /#sidebar-wrapper -->

	<!-- Page Content -->
	<div id="page-content-wrapper">
		<!-- Navbar -->
		<nav class="navbar navbar-default navbar-static-top navbar-marcador">
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="#" class="navbar-brand navbar-menu-btn">
						<i class="material-icons md-light">menu</i>
					</a>
					<a class="navbar-brand" href="#">
						<img id="logo" src="<?php echo esc_url( get_template_directory_uri() );  ?>/assets/imgs/logo.png" height="24" width="130" alt="logo">
					</a>
				</div>
			</div>
		</nav>
		<!-- /.navbar-marcador -->

