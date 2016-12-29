<!-- Marcador Hero Post Score -->
<div class="row marcador-hero-post score aaaa">
      <div class="col-xs-12">
        <header class="marcador-hero-unit">
        <img src="<?php echo the_post_thumbnail_url('full'); ?>" width='100%' alt="<?php the_title(); ?>">
            <div class="scoreboard row">
                 <?php
                $meta = get_post_meta($post->ID);
                $status = $meta['marcador_sp_game_status'][0];
                $data = json_decode( $meta['marcador_sp_game_data'][0] );
              ?>
                
<div class="team-1 col-xs-6"><?php echo $data->home->name; ?></div>
    <div class="board">
    <div><span><?php echo $data->home->runs; ?></span><span> <?php echo $data->away->runs; ?></span></div>
    <div class="status"><?php echo $status; ?></div>
    </div>
<div class="team-2 col-xs-6"><?php echo $data->away->name; ?></div>
</div>
          </header>
        <a href="<?php the_permalink(); ?>" class="marcador-hero-permalink">
          <div class="hero-heading">
            <h1 class="heading"><?php the_title(); ?></h1>
            <p class="excerpt"><?php the_excerpt(); ?></p>
          </div>
        </a>
      </div>
    </div>
<!-- /.marcador-hero-post.score -->