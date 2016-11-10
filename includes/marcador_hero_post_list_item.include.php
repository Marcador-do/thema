 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 marcador-post-list">
                  <div class="row">
                    <div class="col-xs-4 col-sm-5 marcador-post-list-image-col">
                      <a href="<?php the_permalink(); ?>">
                        <?php if ( has_post_thumbnail($post->ID) ): ?>
                        <div class="marcador-post-list-image" style="background-image: url('<?php the_post_thumbnail_url("thumbnail"); ?>');"></div>
                        <?php else: ?>
                        <div class="marcador-post-list-image"></div>
                        <?php endif; ?>
                      </a> 
                    </div>
                    <div class="col-xs-8 col-sm-7">
                      <div class="marcador-post-list-content">
                        <div class="marcador-post-list-category">
                            <?php the_category(', '); ?>
                        </div>
                        <div class="marcador-post-list-title">
                          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </div>
                        <div class="marcador-post-list-meta">
                          <div class="marcador-post-list-author">
                            <?php the_author_posts_link(); ?>
                          </div>
                          <div class="marcador-post-list-date">
                            <a href="#date-link">
                              <?php the_date('M d, Y'); ?>
                            </a> 
                          </div>
                            <div class="marcador-post-list-excerpt">
                            <p>
                              <?php the_excerpt(); ?>
                            </p> 
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
                          <!-- Conditional -->
                          <div class="marcador-post-list-fav">
                            <i class="material-icons">star</i>
                          </div>
                          <!-- end conditional -->
                        <?php endif; ?>
                        <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
