<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 marcador-post-list card">
    <div class="container-fluid">
        <div class="row">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="marcador-post-list-title">
                <a href="<?php echo esc_url( get_permalink() ); ?>">
                  <?php the_title(); ?>
                </a>
              </div>
            </div>
            <div class="panel-body">
              <?php 
                $categories   = get_the_category();
                $category     = $categories[0]->name; 
                $category_id  = $categories[0]->term_id; // var_dump($categories[0]); 
                $cat_count    = count( $categories ) - 1;
                $c            = 0; ?>
                <?php if( $cat_count > 1 ): ?>
                  <div class="marcador-post-list-category">
                    <?php foreach ($categories as $cat => $cat_value):  ?>
                      <?php if( $cat_value->slug != 'acento' ): ?>
                        <a href="<?php echo esc_url( get_category_link( $cat_value->term_id ) ); ?>">
                          <?php echo $cat_value->name; ?>
                        </a>
                        <?php if( ++$c !== $cat_count ): ?>,<?php endif; ?>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </div>
                <?php endif; ?>
            </div>
            <a href="<?php echo esc_url( get_permalink() ); ?>">
              <?php if( has_post_thumbnail( get_the_id()) ): ?>
                <div class="panel-body marcador-post-list-image" style="background-image: url('<?php echo $image[0]; ?>')">
                  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ), 'full' ); ?>
                </div>
              <?php endif; ?>
            </a> 
            <div class="panel-body">
              <div class="marcador-post-list-excerpt">
                <?php the_excerpt(); ?>
              </div>
            </div>
            <div class="panel-footer">
              <div class="marcador-post-list-meta">
                <div class="container-fluid">
                  <div class="row">
                    
                    <div class="col-xs-4">
                      <div class="marcador-post-list-author">
                        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
                          <?php echo get_the_author_meta( 'user_nicename' ); ?>
                        </a>
                      </div>
                    </div>
                    
                    <?php 
                    $before = '<div class="col-xs-8"><div class="marcador-post-list-date">'; 
                    $before .= '<a href="' . esc_url( get_day_link( $year = get_the_date('Y') , $month = get_the_date('m'), $day = get_the_date('d') ) ) . '">';
                    $before .= '<div class="meta-divisor"></div>';
                    $after = '</a></div></div>';
                    ?>
                    
                    <?php the_date( $d = 'M d, Y', $before, $after, $echo = true ); ?>

                  </div>
                </div>
              </div>
              
              <!-- Conditional if favorite -->
              <div class="marcador-post-list-fav">
                <i class="material-icons">star</i>
              </div>
              <!-- end conditional -->

            </div>

          </div>
        </div>
    </div>
</div> 

