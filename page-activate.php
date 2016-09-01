<?php  
/**
 * [page-form.php]
 *
 * Page Form template.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @author  Ronnie Baez <ronnie.baez@gmail.com>
 * @package marcadordo
 */

  $key = "";
  // If key not set, ignore and send to home
  if ( ! isset( $_GET['k'] ) ) wp_redirect( home_url( '/' ) );
  
  do_action('marcador_activate_user'); // resides on marcador_manager plugin
?>
<?php get_header(); ?>
<div id="marcador-page-template" class="search">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 div col-sm-12 col-md-12 col-lg-9">
        <header class="page-header-template">
          <h2 class="page-title">
            <?php the_title(); ?>
          </h2>
        </header> 
      </div>
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="col-xs-12 div col-sm-12 col-md-12 col-lg-9">
        <div class="page-content-template">
          <h3>Enhorabuena, <?php echo $user->display_name; ?>!</h3>
          <p>Ya puedes colaborar en Marcador.do. <strong>Tu cuenta esta activada.</strong></p>
          <p><a href="<?php echo home_url( '/' ); ?>"><?php echo home_url( '/' ); ?></a></p>
        </div>
      </div>
      <?php endwhile; endif; ?>
    </div>
  </div>
</div> 
<?php get_footer(); ?>