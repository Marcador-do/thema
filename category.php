<?php  
/**
 * [category.php]
 *
 * The category template. Used when a category is queried.
 *
 * @link https://codex.wordpress.org/Category_Templates
 * @author  Richard Blonder <richardblondet@gmail.com>
 * @package marcadordo
 */
?>
<?php get_header(); ?>
<?php /* <!-- #marcador-navbar-submenu --> */ ?>
<?php 
  if ( has_nav_menu( 'deportes_top' ) ) {
    $args = array(
      'theme_location' => 'deportes_top',
      'container_id' => 'marcador-navbar-submenu',
      'menu_class' => 'nav nav-pills',
      'depth' => 1,
    );
    wp_nav_menu( $args );
  }
?>
<?php /* <!-- /#marcador-navbar-submenu --> */ ?>

<?php get_footer(); ?>