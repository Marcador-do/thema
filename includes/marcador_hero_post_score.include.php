<!-- Marcador Hero Post Score -->
<div class="marcador-hero-post score">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-9 col-md-12 col-sm-12">
        <header class="marcador-hero-unit" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>');">
          <div class="hero-score">
            <div class="hero-score-wrapper">
              <?php
                $meta = get_post_meta($post->ID);
                $status = $meta['marcador_sp_game_status'][0];
                $data = json_decode( $meta['marcador_sp_game_data'][0] );
              ?>
              <div class="team-1">
                <div class="team-name">
                  <?php echo $data->home->name; ?>
                </div>
              </div>
              <div class="score-marc">
                <div class="score-team-1">
                  <?php echo $data->home->runs; ?>
                </div>
                <div class="score-team-2">
                  <?php echo $data->away->runs; ?>
                </div>
                <div class="score-status">
                  <?php echo $status; ?>
                </div>
              </div>
              <div class="team-2">
                <div class="team-name">
                  <?php echo $data->away->name; ?>
                </div>
              </div>
            </div>
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
  </div>
</div>
<!-- /.marcador-hero-post.score -->