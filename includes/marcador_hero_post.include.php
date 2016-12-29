<!-- Marcador Hero Post -->
<div class="row marcador-hero-post score aaaa">
      <div class="col-xs-12">
        <header class="marcador-hero-unit">
        <img src="<?php echo the_post_thumbnail_url('full'); ?>" width='100%' alt="<?php the_title(); ?>">
          </header>
        <a href="<?php the_permalink(); ?>" class="marcador-hero-permalink">
          <div class="hero-heading">
            <h1 class="heading"><?php the_title(); ?></h1>
                  		<div class="marcador-post-list-meta">
                		<div class="marcador-post-list-author">
                			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
                				<?php echo get_the_author_meta( 'user_nicename' ); ?>
                			</a>
                		</div>
                		<div class="marcador-post-list-date">
                  			<a href="<?php echo esc_url( get_day_link( $year = get_the_date('Y') , $month = get_the_date('m'), $day = get_the_date('d') ) ) ?>">
                    			<?php the_date('M d, Y', '<div class="meta-divisor"></div>', ''); ?>
                  			</a> 
            			</div>
            			<!-- Conditional if favorite -->
		                <div class="marcador-post-list-fav">
		                	<i class="material-icons">star</i>
		                </div>
            			<!-- end conditional -->
              		</div>
            <p class="excerpt"><?php the_excerpt(); ?></p>
          </div>
        </a>
      </div>
    </div>
<!-- /.marcador-hero-post -->