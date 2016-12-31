<?php if (!isset($width)) $width = 6; ?>
<div class="col-xs-12 col-sm-<?php echo $width; ?> col-md-<?php echo $width; ?> col-lg-<?php echo $width; ?> marcador-post-list card">
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
                <?php echo excerpt(30); ?>
              </div>
            </div>
            <div class="panel-footer">
              <div class="marcador-post-list-meta">
                  <div class="row">
                    
                    <div class="col-xs-6 col-md-4 col-md-push-4 marcador-post-list-author">
                      
                        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
                          <?php echo get_the_author_meta( 'user_nicename' ); ?>
                        </a>
                      
                    </div>
                      <div class="col-xs-6 col-md-4 col-md-push-4 marcador-post-list-date">
                        <a href="<?php echo esc_url( get_day_link( $year = get_the_date('Y') , $month = get_the_date('m'), $day = get_the_date('d') ) ) ?>">
                          <?php the_date('M d, Y', '<div class="meta-divisor"></div>', ''); ?>
                        </a> 
                         <?php if(check_favorite_category_user(wp_get_post_categories(get_the_id()))): ?>
                        <!-- Conditional -->
                       <i class="material-icons marcador-post-list-fav">star</i></div>
                      <?php endif; ?>
                          
                  </div>
              </div>
              
              <!-- Conditional if favorite -->
                
              <!-- end conditional -->

            </div>

    </div>
</div> 

