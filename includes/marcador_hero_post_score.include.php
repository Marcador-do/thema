<!-- Marcador Hero Post Score -->
<div class="row marcador-hero-post score">
      <div class="col-xs-12">
        <header class="marcador-hero-unit" style="background-image: url('<?php echo the_post_thumbnail_url('full'); ?>');">
            <div class="scoreboard">
                 <?php
                $meta = get_post_meta($post->ID);
                $status = $meta['marcador_sp_game_status'][0];
                $data = json_decode( $meta['marcador_sp_game_data'][0] );
              ?>
                
<span><?php echo $data->home->name; ?></span>
    <div class="board">
    <div><span><?php echo $data->home->runs; ?></span><span> <?php echo $data->away->runs; ?></span></div>
    <h6><?php echo $status; ?></h6>
    </div>
<span><?php echo $data->away->name; ?></span>
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