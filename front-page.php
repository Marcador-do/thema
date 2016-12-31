<?php  
/**
 * Template Name: Front Page
 * [front-page.php]
 *
 * The home page template.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @author  Richard Blonder <richardblondet@gmail.com>
 * @author  Raylin Aquino <raylinaquino@gmail.com>
 * 
 * @package marcadordo
 */

get_header();

/**
 * Asking if the primary_top menu exists
 */
if ( has_nav_menu( 'primary_top' ) ) {
	/**
	 * WP_NAV_MENU Args
	 * @var array
	 */
	$args = array(
		'theme_location' => 'primary_top',
		'container_id' => 'marcador-navbar-submenu',
		'menu_class' => 'nav nav-pills',
		'depth' => 1,
		);
	wp_nav_menu( $args );
}
/* /#marcador-navbar-submenu */


 ?>




	<div id="main-content" class="container-fluid">
		<div class="the-content">
			<div>

				<!-- GRID START -->
		        <?php the_content(); ?>
		        <!-- GRID END -->
		
				
	
        
        <!-- SIDEBAR -->
        <?php get_sidebar('front-page'); ?>
	
	</div>
	
<?php get_footer(); ?>
