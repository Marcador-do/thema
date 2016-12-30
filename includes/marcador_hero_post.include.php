<?php 

$posted_id[] = get_the_id();
          $data_post = types_render_field('data', array('output'=>'raw'));
          $post_type_marcador = get_post_type();

          if($post_type_marcador == 'marcador_partido'){
            $meta = get_post_meta(get_the_id());
            $status = $meta['marcador_sp_game_status'][0];
            $data_partido = json_decode( $meta['marcador_sp_game_data'][0] );

          } else if(!empty($data_post)){


            $data_partido = array();
            $status = types_render_field('status', array('output'=>'raw'));

            $data_part = explode(',',trim($data_post));
            $part1 = explode('-',trim($data_part[0]));
            $part2 = explode('-',trim($data_part[1]));

            $data_partido['home']['name'] =  trim($part1[0]);
            $data_partido['home']['runs'] =  trim($part1[1]);
            $data_partido['away']['name'] =  trim($part2[0]);
            $data_partido['away']['runs'] =  trim($part2[1]);

            $data_partido = json_decode(json_encode($data_partido));

} 
 ?>
<!-- Marcador Hero Post -->
          <article class="row marcador-hero-post">
            <div class="col-xs-12">
              <a class="marcador-hero-permalink" href="<?php the_permalink(); ?>">
                <header class="marcador-hero-unit" style="background-image: url('<?php the_post_thumbnail_url("large") ?>')" >
                

                  <?php 

                  if($post_type_marcador == 'marcador_partido' or !empty($data_post)){
                    ?>
                    <div class="scoreboard row">

                      <div class="team-1 col-xs-6"><?php echo $data_partido->home->name; ?></div>
                      <div class="board">
                        <div><span><?php echo $data_partido->home->runs; ?></span><span> <?php echo $data_partido->away->runs; ?></span></div>
                        <div><?php echo $status; ?></div>
                      </div>
                      <div class="team-2 col-xs-6"><?php echo $data_partido->away->name; ?></div>

                    </div>
                    <?php
                  } else {
                    if($show_title != '1'):
                      ?>
                    <h1 class="heading">
                      <?php the_title(); ?>
                    </h1>
                    <?php 
                    endif; 
                  }
                  ?>
                </header>
              </a>
              <?php 

              if($post_type_marcador == 'marcador_partido' or !empty($data_post)){
                ?>  
                <h1 class="heading">
                  <?php the_title(); ?>
                </h1>
                <?php } ?>
                <p>
                  <?php 
                  if($show_author != '1'):
                    ?>
                  <span class="author"><?php _e('Por'); ?> <?php the_author_posts_link(); ?></span> 
                <?php endif; ?>

                <?php 
                if($show_date != '1'):
                  ?>
                <span class="date">
                  <?php echo get_the_date('M d, Y'); ?>
                    <!-- Conditional -->
                  <span class="marcador-post-list-fav">
                  <i class="material-icons">star</i>
                  </span>
                </span>
              <?php endif; ?>
            </p>
            <?php 
            if($show_excerpt != '1'):

              echo wp_trim_words(get_the_excerpt(),$excerpt_limit);
            endif;
            ?>

          </div>
        </article>
        <!-- Edit Content -->
        <?php echo  dt_get_link_edit(get_the_id()); ?>