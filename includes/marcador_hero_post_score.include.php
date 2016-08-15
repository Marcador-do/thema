<!-- Marcador Hero Post Score -->
<div class="marcador-hero-post score">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-9 col-md-12 col-sm-12">
        <header class="marcador-hero-unit" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>');">
          <div class="hero-score">
            <div class="hero-score-wrapper">
              <div class="team-1">
                <div class="team-name">
                  Barca
                </div>
              </div>
              <div class="score-marc">
                <div class="score-team-1">
                  1
                </div>
                <div class="score-team-2">
                  3
                </div>
                <div class="score-status">
                  finalizado
                </div>
              </div>
              <div class="team-2">
                <div class="team-name">
                  Real Madrid
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