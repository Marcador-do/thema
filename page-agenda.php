<?php  
/**
 * [page-agenda.php]
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

<div id="marcador-page-template" class="search">
  <div id="main-content" class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <header class="page-header-template">
          <h2 class="page-title">
            <?php wp_title($sep = '') ?>
          </h2>
        </header>
        <br />
      </div>
        <?php get_sidebar();?>
    </div>
    <div class="row">
      <div class="col-xs-12 div col-sm-12 col-md-12 col-lg-12 centered">
        <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;mode=WEEK&amp;height=600&amp;wkst=2&amp;bgcolor=%23FFFFFF&amp;src=6q97fnjocsid82pnq49ko6ehmk%40group.calendar.google.com&amp;color=%231B887A&amp;ctz=America%2FSanto_Domingo" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>