<!-- Marcador Hero Post -->
<div class="row marcador-hero-post">
      <div class="col-xs-12">
        <a class="marcador-hero-permalink" href="<?php the_permalink(); ?>">
          <header class="marcador-hero-unit" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>');">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-12 col-xs-12">
                  <div class="hero-heading">
                    <h1 class="heading">
                      <?php the_title(); ?>
                    </h1>
                  </div>
                </div>
              </div>
            </div>
          </header>
          <p><?php the_author_posts_link(); ?> <?php the_date('M d, Y'); ?></p>
          <p class="excerpt"><?php the_excerpt(); ?></p>
        </a> 
      </div>
</div>
<!-- /.marcador-hero-post -->