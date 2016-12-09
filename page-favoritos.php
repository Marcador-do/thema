<?php  
/**
 * [page.php]
 *
 * Page template.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @author  Ronnie Baez <ronnie.baez@gmail.com>
 * @package marcadordo
 */
?>
<?php

get_header();

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$have_cats = false;

$user_cats = get_option(get_user_meta_category_favorites());

if(!empty($user_cats)){
  $have_cats = true;
  $user_cats = explode(',',$user_cats);
}


$args = array(
  'post_per_page' => 10,
  'paged' => $paged,
  'post_type'=>'post',
  'category__in' => $user_cats
);


$query_fav = new WP_Query($args);


?>
<div id="marcador-page-template" class="search">
  <div id="main-content" class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
       <div id="favoritos" class="row">
       <h1 class="page-title"><?php _e('Favoritos'); ?></h1>
       <h2><?php _e('Esta sección filtra los contenidos de las categorías que has elegido en la sección de') ?> <a href="<?php echo get_site_url(); ?>/mis-equipos"><strong>Mis Equipos</strong></a></h2>

        <?php 

         
        if( $query_fav->have_posts() and $have_cats ):
        
       ?>
     <div class="fav-results">
       <?php  echo sprintf(__('Se han encontrado <strong>%s</strong> resultados'), $query_fav->max_num_pages);
         ?>
     </div>
     <?php
        get_custom_pagination($query_fav->max_num_pages , $paged);

          while($query_fav->have_posts()):
            $query_fav->the_post();

           if(has_post_thumbnail()){
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id(), "middle");
                    $image = $image[0];
           }

          $post_categories = get_the_category(get_the_id());
           //var_dump($post_categories);
          /** Get Icons Favorites */
          $icons_cat = array();
          $c = 0;

          foreach($post_categories as $ca){
            if($c == 4){
              continue;
            }

            if(in_array($ca->term_id, $user_cats) === true){
               $icons_cat[] = $ca;
               $c++;
            }
          }
          ?>

          <article class="col-sm-6">
            <div class="post" style='background-image:url("<?php echo $image ?>");'>
              <a href="<?php the_permalink(); ?>">
                <footer>
                  <h4 class="col-xs-7 title"><?php the_title(); ?></h4>
                  <div class="col-xs-5 tags">
                    <?php 
                    $icono = "";
                    foreach($icons_cat as $icon): 
                      $icono = "";
                      $icono = get_term_meta($icon->term_id,"wpcf-icono");
                    if(!empty($icono)){

                       $img_cat_url = wp_get_attachment_image_src(get_attachment_id($icono[0]));
                       $img_cat_url = $img_cat_url[0];

                    }
                     

                    ?>
                      <span class="badge real-madrid" data-toggle="tooltip" title="<?php echo $icon->name;?>" style="background-image:url('<?php echo $img_cat_url;?>')"></span>
                    <?php endforeach;?>
                  </div>
                </footer>
              </a>    
            </div>
          </article> 
          <?php 
          endwhile; 
          ?>
          <div class="clearfix"></div>
          <?php  
          get_custom_pagination($query_fav->max_num_pages, $paged);

          else:
            ?>
          <div class="alert alert-warning">
            <?php echo sprintf(__('No has seleccionado ningún contenido para favoritos. <a href="%s">Seleccionar favoritos</a>'), get_site_url().'/mis-equipos');?>
          </div> 
        <?php endif; ?>
      </div>

    </div>

    <!-- SIDEBAR -->
    <?php get_sidebar(); ?>
    
  </div>
</div>
</div> 
<?php get_footer(); ?>