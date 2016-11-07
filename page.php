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
<?php get_header(); ?>
<div id="marcador-page-template" class="search">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-lg-9">
        <header class="page-header-template">
          <h2 class="page-title">
            <?php the_title(); ?>
          </h2>
        </header> 

        <?php if (have_posts()) : while (have_posts()) : the_post();?>
          <div class="page-content-template">
            <?php the_content(); ?>
          </div>
        <?php endwhile; endif; ?>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
</div> 
<?php get_footer(); ?>