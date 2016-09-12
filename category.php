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

  // /category/[baloncesto]/[nba]/
  $data = explode("/",$_SERVER['REQUEST_URI']); 
  $disciplina = $data[2]; // Ex: baloncesto
  if (count($data) > 4) $liga = $data[3]; // Ex: nba
?>
<?php get_header(); ?>

<?php /* <!-- #marcador-navbar-submenu --> */ ?>
<?php 
  if ( has_nav_menu( 'deportes_top' ) ) {
    $args = array(
      'theme_location' => 'deportes_top',
      'container_id' => 'marcador-navbar-submenu',
      'menu_class' => 'nav nav-pills',
      'depth' => 2,
    );
    wp_nav_menu( $args );
  }
?>
<?php /* <!-- /#marcador-navbar-submenu --> */ ?>

<?php 
$test = array();
if (!isset($liga)) {
  $category = get_category_by_slug( $disciplina );
  if ($category !== false) {
    $disciplina_id = $category->cat_ID;
    $all_ligas = get_categories( $args = array(
      'taxonomy' => 'category',
      'child_of' =>$disciplina_id)
    );

    if (count($all_ligas) > 0) {
      $liga_id = $all_ligas[0]->cat_ID;

      for ($i=0,$e=count($all_ligas); $i<$e; $i++) {
        array_push($test, $all_ligas[$i]->cat_ID);
      }
    }
  }
} else {
  $liga_id = get_category_by_slug( $liga )->cat_ID;
  if ($category !== false) array_push($test, $liga_id);
}

if (count($test) > 0) {
  $paged = get_query_var( 'paged', 1 );
  $args = array(
    'category__in' => $test,
    'post_type' => 'any',
    
    'post_status' => array(
      'publish',
    ),
    'order'               => 'DESC',
    'orderby'             => 'date',
    'ignore_sticky_posts' => false,
    'posts_per_page'         => 21,
    'perm' => 'readable',
    'paged' => $paged,
  );
  $principal = new WP_Query( $args );
} ?>

<?php if ($principal): while ( $principal->have_posts() ): $principal->the_post(); ?>

  <?php if ( $principal->current_post === 0 ): ?>
    <?php if ( get_post_type() === "marcador_partido" ): ?>
      <?php include (get_template_directory() . "/includes/marcador_hero_post_score.include.php"); ?>
    <?php else: ?>
      <?php include (get_template_directory() . "/includes/marcador_hero_post.include.php"); ?>
    <?php endif; ?>
    <div class="container-fluid">
        <div class="row">

          <div class="col-xs-12 col-sm-12 col-lg-9">
            <!-- Marcador posts -->
            <div class="marcador-posts-listing-wrapper cards">
              <div class="container-fluid">
                <div class="row">
  <?php continue; endif; ?>
                  <?php include (get_template_directory() . "/includes/marcador_hero_post_list_item.include.php"); ?>
<?php endwhile; ?>
                </div>

                <div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
                <div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
              </div>
            </div>
            <!-- .marcador-posts-listing -->
          </div> 
      </div>
    </div>

    <script type="text/javascript">

    </script>
<?php else: ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-lg-9">
        <!-- Marcador posts -->
        <div class="marcador-posts-listing-wrapper cards">
          <div class="container-fluid">
            <div class="row">
              <h1>Nothing found</h1>
            </div>
          </div>
        </div>
        <!-- .marcador-posts-listing -->
      </div> 
    </div>
  </div>
<?php endif; ?>
<?php get_footer(); ?>