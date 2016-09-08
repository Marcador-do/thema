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

<?php 
/**
 * Virales
 */
$cat_dest = get_category_by_slug( 'virales' );
$display_type = 1;  // TODO: Get from options
$args = array(
//  'category_name'    => 'destacado,destacadas',
  'category__in' => array( $cat_dest->cat_ID, $cat_dests->cat_ID ), // TODO: Get from options
  'post_type' => 'any',
  
  'post_status' => array(
    'publish',
  ),
  'order'               => 'DESC',
  'orderby'             => 'date',
  'ignore_sticky_posts' => false,
  'posts_per_page'         => 5,
  'perm' => 'readable',
);

$virales = new WP_Query( $args ); ?>

  <div class="container-fluid">
    <div class="row">
          <div class="col-xs-12 col-sm-12 col-lg-9">
            <!-- Marcador posts -->
            <div class="marcador-posts-listing-wrapper cards">
              <div class="container-fluid">
                <div class="row">

        <?php $sizes = array(4,6,8,12);
        while ( $virales->have_posts() ): $virales->the_post(); ?>
          <?php if(isset($last)){
            $width = $last;
            unset($last);
          } else {$width = $sizes[rand ( 0, 3 )];} ?>
          <?php include ( get_template_directory() . "/includes/marcador_hero_post_list_item_card.include.php" ); ?>
          <?php 
            if($width == 12) unset($last);
            else $last = 12 - $width;
          ?>
        <?php endwhile; ?>

                </div>
              </div>
            </div>
            <!-- .marcador-posts-listing -->
          </div>
    </div>
  </div>



<?php get_footer(); ?>