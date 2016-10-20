<!-- Marcador Hero Post -->
<div class="row marcador-hero-post">
      <div class="col-xs-12">
        <a class="marcador-hero-permalink" href="<?php the_permalink(); ?>">
          <header class="marcador-hero-unit" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>');">
                    <h1 class="heading">
                      <?php the_title(); ?>
                    </h1>
          </header>
          <p><span class="col-xs-12 col-lg-2">Por <?php the_author_posts_link(); ?></span> <span class="col-xs-12 col-lg-2"><?php the_date('M d, Y'); ?></span></p>
          <p class="excerpt"><?php the_excerpt(); ?></p>
        </a> 
      </div>
</div>
<!-- /.marcador-hero-post -->