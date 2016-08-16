<?php  
/**
 * [page-virales.php]
 *
 * Page Form template.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @author  Ronnie Baez <ronnie.baez@gmail.com>
 * @package marcadordo
 */

  //response generation function
  $response = "";
  if ( isset( $_POST['submitted'] ) && '1' == $_POST['submitted'] ) {
    do_action('marcador_form');
  }
?>
<?php get_header(); ?>
<?php /* <!-- #marcador-navbar-submenu --> */ ?>
<?php 
  if ( has_nav_menu( 'primary_top' ) ) {
    $args = array(
      'theme_location' => 'primary_top',
      'container_id' => 'marcador-navbar-submenu',
      'menu_class' => 'nav nav-pills',
      'depth' => 1,
    );
    wp_nav_menu( $args );
  }
?>
<?php /* <!-- /#marcador-navbar-submenu --> */ ?>


<?php get_footer(); ?>