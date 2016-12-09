<?php  
/**
 * [page-virales.php]
 *
 * Page Form template.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @author  Ronnie Baez <ronnie.baez@gmail.com>
 * @package marcadordo
 */

  //response generation function
  $response = "";
  if ( isset( $_POST['submitted'] ) && '1' == $_POST['submitted'] ) {
    do_action('marcador_form');
  }
?>
<?php get_header(); ?>
<?php /* <!-- #marcador-navbar-submenu --> */ ?>
<?php 
  if ( has_nav_menu( 'primary_top' ) ) {
    $args = array(
      'theme_location' => 'primary_top',
      'container_id' => 'marcador-navbar-submenu',
      'menu_class' => 'nav nav-pills',
      'depth' => 1,
    );
    wp_nav_menu( $args );
  }
?>
<?php /* <!-- /#marcador-navbar-submenu --> */ ?>

<?php 
/**
 * Virales
 */
$cat_dest = get_category_by_slug( 'virales' );
$display_type = 1;  // TODO: Get from options
$args = array(
//  'category_name'    => 'destacado,destacadas',
  'category__in' => array( $cat_dest->cat_ID, $cat_dest->cat_ID ), // TODO: Get from options
  'post_type' => 'any',
  
  'post_status' => array(
    'publish',
  ),
  'order'               => 'DESC',
  'orderby'             => 'date',
  'ignore_sticky_posts' => false,
  'posts_per_page'         => 5,
  'perm' => 'readable',
);

$virales = new WP_Query( $args ); ?>

  <div id="main-content" class="container-fluid">
    <div class="row">
          <div class="col-lg-12">
           
              <!--VIRALES -->
              
              <div id="virales" class="row">
    
        <div class="col-xs-12 col-md-8">
            <div class="panel panel-default">
            <h4 class="page-title">Baloncesto</h4>
                <div class="panel-body marcador-post-list-image" style="background-image: url('http://dev.marcador.do/wp-content/uploads/2016/09/NBA-Sindicato.jpg')"></div>
                <div class="panel-body">
                <div class="marcador-post-list-title">
                <a href="#">Temporada perfecta para Warriors arruinada: Lebron e Irving dan titulo. Lorem ipsum dolor sit amet.</a>
                </div>
                
                <div class="marcador-post-list-excerpt">
                La NBA y Asociación Nacional de Jugadores de Baloncesto han trabajado juntos durante los últimos días para crear un plan para el manejo de posibles protestas de los jugadores durante la entonación del himno nacional, según fuentes de ESPN.com. Adan Silver, el comisionado de la NBA, y Michele […]
                </div>
                </div>
                <div class="panel-footer">
                    <div class="marcador-post-list-fav">
                <i class="material-icons">star</i>
              </div>
                <div class="marcador-post-list-meta">
                  <div class="row">
                       <div class="col-xs-6 col-sm-4 marcador-post-list-date pull-right"><a href="#">Sep 21, 2016</a></div>
                      
                    <div class="col-xs-6 col-sm-4 marcador-post-list-author pull-right">
                        <a href="#">Cesar Marchena</a>
                    </div>
                                        
                   
                  </div>
                    
              </div>
                    
                
                </div>
                
            </div>
        </div>
        <div class="col-xs-12 col-md-4">
        <div class="panel panel-default">
            <h4 class="page-title">Baloncesto</h4>
                <div class="panel-body marcador-post-list-image" style="background-image: url('http://dev.marcador.do/wp-content/uploads/2016/09/NBA-Sindicato.jpg')"></div>
                <div class="panel-body">
                <div class="marcador-post-list-title">
                <a href="#">Temporada perfecta para Warriors arruinada: Lebron e Irving dan titulo.</a>
                </div>
                
                <div class="marcador-post-list-excerpt">
                La NBA y Asociación Nacional de Jugadores de Baloncesto han trabajado juntos durante los últimos días […]
                </div>
                </div>
                <div class="panel-footer">
                    <div class="marcador-post-list-fav">
                <i class="material-icons">star</i>
              </div>
                <div class="marcador-post-list-meta">
                  <div class="row">
                       
                    <div class="col-xs-6 marcador-post-list-author ">
                        <a href="#">Cesar Marchena</a>
                    </div>
                      <div class="col-xs-6 marcador-post-list-date"><a href="#">Sep 21, 2016</a></div>
                     </div>
                    
              </div>
                    
                
                </div>
                
            </div>
            </div>
        <div class="col-xs-12">
                          <div class="panel panel-default">
                          <h4 class="page-title">VIDEO</h4>
                              <div class="panel-body panel-video">
                               <iframe id="live" src="https://www.youtube.com/embed/1UdirOGTjOg" frameborder="0" allowfullscreen></iframe>
                              </div>
                          </div>
                      </div>
        <div class="col-sm-12 col-md-6">
        <div class="panel panel-default">
            <h4 class="page-title">Baloncesto</h4>
                <div class="panel-body marcador-post-list-image" style="background-image: url('http://dev.marcador.do/wp-content/uploads/2016/09/NBA-Sindicato.jpg')"></div>
                <div class="panel-body">
                <div class="marcador-post-list-title">
                <a href="#">Temporada perfecta para Warriors arruinada: Lebron e Irving dan titulo. Lorem ipsum dolor sit amet.</a>
                </div>
                
                <div class="marcador-post-list-excerpt">
                La NBA y Asociación Nacional de Jugadores de Baloncesto han trabajado juntos durante los últimos días para crear un plan para el manejo de posibles protestas de los jugadores durante la entonación del himno nacional, según fuentes de ESPN.com. Adan Silver, el comisionado de la NBA, y Michele […]
                </div>
                </div>
                <div class="panel-footer">
                    <div class="marcador-post-list-fav">
                <i class="material-icons">star</i>
              </div>
                <div class="marcador-post-list-meta">
                  <div class="row">
                       <div class="col-xs-6 col-sm-4 marcador-post-list-date pull-right"><a href="#">Sep 21, 2016</a></div>
                      
                    <div class="col-xs-6 col-sm-4 marcador-post-list-author pull-right">
                        <a href="#">Cesar Marchena</a>
                    </div>
                     </div>
                    
              </div>
                    
                
                </div>
                
            </div>
    </div>
        <div class="col-sm-12 col-md-6">
        <div class="panel panel-default">
            <h4 class="page-title">Baloncesto</h4>
                <div class="panel-body marcador-post-list-image" style="background-image: url('http://dev.marcador.do/wp-content/uploads/2016/09/NBA-Sindicato.jpg')"></div>
                <div class="panel-body">
                <div class="marcador-post-list-title">
                <a href="#">Temporada perfecta para Warriors arruinada: Lebron e Irving dan titulo. Lorem ipsum dolor sit amet.</a>
                </div>
                
                <div class="marcador-post-list-excerpt">
                La NBA y Asociación Nacional de Jugadores de Baloncesto han trabajado juntos durante los últimos días para crear un plan para el manejo de posibles protestas de los jugadores durante la entonación del himno nacional, según fuentes de ESPN.com. Adan Silver, el comisionado de la NBA, y Michele […]
                </div>
                </div>
                <div class="panel-footer">
                    <div class="marcador-post-list-fav">
                <i class="material-icons">star</i>
              </div>
                <div class="marcador-post-list-meta">
                  <div class="row">
                       <div class="col-xs-6 col-sm-4 marcador-post-list-date pull-right"><a href="#">Sep 21, 2016</a></div>
                      
                    <div class="col-xs-6 col-sm-4 marcador-post-list-author pull-right">
                        <a href="#">Cesar Marchena</a>
                    </div>
                     </div>
                    
              </div>
                    
                
                </div>
                
            </div>
    </div>
    </div>
              
              <!-- .VIRALES -->
              
              
          </div>
        <!-- SIDEBAR -->
        
        <?php get_sidebar(); ?>
        
    </div>
  </div>



<?php get_footer(); ?>