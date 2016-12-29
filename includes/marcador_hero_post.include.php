<!-- Marcador Hero Post -->
<div class="row marcador-hero-post score aaaa">
      <div class="col-xs-12">
        <header class="marcador-hero-unit">
        <img src="<?php echo the_post_thumbnail_url('full'); ?>" width='100%' alt="<?php the_title(); ?>">
          </header>
        <a href="<?php the_permalink(); ?>" class="marcador-hero-permalink">
          <div class="hero-heading">
            <h1 class="heading"><?php the_title(); ?></h1>
            <p class="excerpt"><?php the_excerpt(); ?></p>
          </div>
        </a>
      </div>
    </div>
<!-- /.marcador-hero-post -->