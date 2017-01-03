 <div <?php post_class('col-xs-12 col-sm-12 col-md-6 col-lg-6 marcador-post-list', $post->ID ); ?>>
                  <div class="row">
                    <div class="col-xs-4 marcador-post-list-image-col">
                      <a href="<?php the_permalink(); ?>">
                        <?php if ( has_post_thumbnail($post->ID) ): ?>
                        <div class="marcador-post-list-image thumb">
                          <img src="<?php the_post_thumbnail_url("thumbnail"); ?>" width='100%' alt="<?php the_title(); ?>">
                        </div>
                        <?php else: ?>
                        <div class="marcador-post-list-image"></div>
                        <?php endif; ?>
                      </a> 
                    </div>
                    <div class="col-xs-8 col-sm-7">
                      <div class="marcador-post-list-content">
                        <div class="marcador-post-list-category">
                            <?php 
                           
                            $cat_childs = get_the_category();

                            //echo '<pre>',print_r($cat_childs),'</pre>';

                            foreach($cat_childs as $ctc){
                              if($ctc->parent != $disciplina_id) continue;
                              ?>
                              <a href="<?php echo get_category_link($ctc->term_id); ?>" rel="category tag"><?php echo $ctc->name;?></a>

                            <?php } ?>
                        </div>
                        <div class="marcador-post-list-title">
                          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </div>
                        <div class="marcador-post-list-meta">
                          <div class="marcador-post-list-author">
                            <?php the_author_posts_link(); ?>
                          </div>
                          <div class="marcador-post-list-date">
                            <a href="<?php echo esc_url( get_day_link( $year = get_the_date('Y') , $month = get_the_date('m'), $day = get_the_date('d') ) ) ?>">
                              <?php the_date('M d, Y'); ?>
                            </a> 
                          </div>
                            
                        <?php 
                          // Check user session
                          if ( is_user_logged_in() ): 
                            // Check user role
                            $user = new WP_User( $user_ID );
                            $marcador_user_role = 'marcador_contributor';
                            $is_colaborator = array_search(
                              $marcador_user_role, 
                              $user->roles, true
                            );
                            if ($is_colaborator !== false && $is_colaborator >= 0):
                              // TODO: Check Favoritos
                        ?>
                            <?php if(check_favorite_category_user(wp_get_post_categories(get_the_id()))): ?>
                        <!-- Conditional -->
                        <div class="marcador-post-list-fav">
                          <i class="material-icons">star</i>
                        </div>
                      <?php endif; ?>
                          <!-- end conditional -->
                        <?php endif; ?>
                        <?php endif; ?>
                        </div>
                          <div class="marcador-post-list-excerpt">
                            
                              <?php echo excerpt(12); ?>
                            
                          </div>
                      </div>
                    </div>
                  </div>
              </div>
