<?php  
/**
 * [category.php]
 *
 * The category template. Used when a category is queried.
 *
 * @link https://codex.wordpress.org/Category_Templates
 * @author  Richard Blonder <richardblondet@gmail.com>
 * @package marcadordo
 */


  // /category/[baloncesto]/[nba]/
  $disciplina = get_query_var( 'category_name' ); // Ex: baloncesto
  $disciplina_id = get_category_by_slug( $disciplina )->cat_ID;
  if ($disciplina_id === 0) $wp_query->set_404();
  $parents = strtolower(get_category_parents( $disciplina_id, false ));
  $parents = explode("/", trim($parents, "/"));
  if (count($parents) > 1) $liga = $parents[1];
  //echo "<pre>";print_r(  );echo "</pre>";
?>
<?php get_header(); ?>

<?php /* <!-- #marcador-navbar-submenu --> */ ?>
<?php 
  if ( has_nav_menu( 'deportes_top' ) ) {
    $args = array(
      'theme_location' => 'deportes_top',
      'container_id' => 'marcador-navbar-submenu',
      'menu_class' => 'nav nav-pills',
      'depth' => 2,
    );
    wp_nav_menu( $args );
  }
?>
<?php /* <!-- /#marcador-navbar-submenu --> */ ?>

<?php 
$cat_ids = array();
$cat_objs = array();
if (!isset($liga)) { // No liga selected

    $all_ligas = get_categories( $args = array(
      'taxonomy' => 'category',
      'child_of' =>$disciplina_id)
    );

    if (count($all_ligas) > 0) {
      $liga_id = $all_ligas[0]->cat_ID;

      for ($i=0,$e=count($all_ligas); $i<$e; $i++) {
        $obj = new stdClass;
        $obj->id = $all_ligas[$i]->cat_ID;
        $obj->name = $all_ligas[$i]->name;
        $obj->slug = $all_ligas[$i]->slug;
        array_push($cat_ids, $all_ligas[$i]->cat_ID);
        array_push($cat_objs, $obj);
      }
    }

} else {
  $liga_id = get_category_by_slug( $liga )->cat_ID;
  if ($category !== false) array_push($cat_ids, $liga_id);
}

$principal;
if (count( $cat_ids ) > 0) {
  $paged = get_query_var( 'paged', 1 );
  $args = array(
    'category__in' => $cat_ids,
    'post_type' => 'any',
    
    'post_status' => array(
      'publish',
    ),
    'order'               => 'DESC',
    'orderby'             => 'date',
    'ignore_sticky_posts' => false,
    'posts_per_page'         => 21,
    'perm' => 'readable',
    'paged' => $paged,
  );
  $principal = new WP_Query( $args );
  $max_pages = $principal->max_num_pages;
} ?>

<?php if ( $principal ): 
  while ( $principal->have_posts() ): $principal->the_post(); ?>
  <?php if ( $principal->current_post === 0 ): ?>
    <?php if ( get_post_type() === "marcador_partido" ): ?>
      <?php include (get_template_directory() . "/includes/marcador_hero_post_score.include.php"); ?>
    <?php else: ?>
      <?php include (get_template_directory() . "/includes/marcador_hero_post.include.php"); ?>
    <?php endif; ?>
    <div id="principal-tab" class="container-fluid tabs">
        <div class="row">

          <div class="col-xs-12 col-sm-12 col-lg-9">
            <!-- Marcador posts -->
            <div class="marcador-posts-listing-wrapper cards">
              <div class="container-fluid">
                <div class="row">
  <?php continue; endif; ?>
                  <?php include (get_template_directory() . "/includes/marcador_hero_post_list_item.include.php"); ?>
<?php endwhile; ?>
                </div>
                    
                    
                <nav aria-label="..." class="col-lg-offset-1 col-md-offset-1 col-lg-9 col-md-9">
                  <ul class="pager">
                    <?php if ($paged < $max_pages): ?>
                      <li class="previous"><?php next_posts_link( '<span aria-hidden="true">&larr;</span> Entradas Anteriores' ); ?></li>
                    <?php endif; ?>
                      <li class="next"><?php previous_posts_link( 'Entradas Recientes <span aria-hidden="true">&rarr;</span>' ); ?></li>
                  </ul>
                </nav>

              </div>
            </div>
            <!-- .marcador-posts-listing -->
          </div> 
      </div>
    </div>


  <div id="resultados-tab" class="container-fluid tabs hidden">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-lg-9">
        <h3>&nbsp;&nbsp;Partidos</h3>
      </div>
      <div class="col-xs-12 col-sm-12 col-lg-9">
        <!-- Marcador posts -->
        <div class="marcador-posts-listing-wrapper cards">
          <div class="container-fluid">
            <div class="row">

              <div class="col-xs-12">
                <div class="container-fluid game-list">
<?php $res_template = <<<STAT_TEMPLATE
                  <div class="row game">
                    <div class="col-xs-10 col-sm-10 col-lg-10 game col">
                      <span class="team home">
                        <span class="name"></span>
                        <span class="logo"><img src=""></span>
                        <span class="runs"></span>
                      </span>
                      <span class="status"></span>
                      <span class="team away">
                        <span class="runs"></span>
                        <span class="logo"><img src=""></span>
                        <span class="name"></span>
                      </span>
                    </div>
                    <div class="details-col">DETALLES</div>
                  </div>\n
STAT_TEMPLATE;
?>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- .marcador-posts-listing -->
      </div> 
    </div>
  </div>


  <div id="calendario-tab" class="container-fluid tabs hidden">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-lg-9">
        
        <!-- Marcador posts -->
        <div class="container-fluid">
          <div class="row">
            <div class="col-xs-12">
              <h1>Calendario</h1>
            </div>
          </div>
          <!-- Calendar --> 
          <?php for ($i=2; $i <= 4; $i++): ?> 
          <div class="row calendar-row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="calendar-day">
                13 de Julio, 2016
              </div>
              <div class="calendar-content">No juegos agendados para este día</div>
            </div>
          </div>
          <?php endfor; ?>
          <div class="row calendar-row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="calendar-day">
                14 de Julio, 2016
              </div>
              <div class="calendar-content">
                <table class="table table-striped marcador-table">
                  <thead>
                    <tr>
                      <th>Partido</th>
                      <th>Local</th>
                      <th>Hora(ET)</th>
                      <th>Lanzador Visitante</th>
                      <th>Lanzador Local</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $tpl=get_template_directory_uri() . '/'; ?>
                    <?php for ($tr=0; $tr < 4; $tr++): ?>
                    <tr>
                      <td><img src="<?php echo $tpl; ?>assets/imgs/mlb/BAL-logo-sm.png" height="16" width="16">Baltimore</td>
                      <td>Cubs</td>
                      <td>2:00 PM</td>
                      <td>Martin Perez</td>
                      <td>Kyle Hendricks</td>
                    </tr>
                    <tr>
                      <td><img src="<?php echo $tpl; ?>assets/imgs/mlb/BOS-logo-sm.png" height="16" width="16">Minesota</td>
                      <td>Yankess</td>
                      <td>7:00 PM</td>
                      <td>Eduardo Rodriguez</td>
                      <td>Michael Pineda</td>
                    </tr>
                    <?php endfor; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- .marcador-posts-listing -->
      </div> 
    </div>
  </div>


  <div id="posiciones-tab" class="container-fluid tabs hidden">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-lg-9">
        <!-- Marcador posts -->
        <div class="marcador-posts-listing-wrapper cards">
          <div class="container-fluid">
            <div class="row">
              <h1>Posiciones</h1>
            </div>
          </div>
        </div>
        <!-- .marcador-posts-listing -->
      </div> 
    </div>
  </div>


  <div id="estadisticas-tab" class="container-fluid tabs hidden">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-lg-9">
        <!-- Marcador posts -->
        <div class="marcador-posts-listing-wrapper cards">
          <div class="container-fluid">
            <div class="row">
              <h1>Estadisticas</h1>
            </div>
          </div>
        </div>
        <!-- .marcador-posts-listing -->
      </div> 
    </div>
  </div>

    <script type="text/javascript">
    <?php //if (isset($cat_objs)): ?>
      var MARCADOR = (function( APP ){

        /**
         * Estadisticas Namespace
         */
        APP.Estadisticas = (function () {

          function onOptionSelected(event) {
            var selected = jQuery(this).val();
            if (selected.length < 1) return; 

            var toLiga = window.location.pathname + selected;
            window.location = selected;
            console.log(toLiga);
            console.log(<?php echo json_encode($parents); ?>);
          }

          function getDropDownList(name, id, optionList) {
            var $combo = jQuery("<select class='form-control'></select>")
                        .attr("id", id)
                        .attr("name", name);
            $combo.append("<option value=''>Seleccione</option>");
            $combo.change(onOptionSelected);
            jQuery.each(optionList, function (i, el) {
              $option = jQuery("<option value='" + el.slug + "'>" + el.name + "</option>");
              $combo.append($option);
            });
            return $combo;
          }

          function getResultados (target) {
            $target = jQuery(target + "-tab").find(".game-list");
            if (APP.ajax) {
              var payload = { action: "resultados", league: "mlb" };
              APP.ajax(
                payload,
                function (data) {
                  var games = data.resultados;
                  var $template = jQuery('<?php echo preg_replace( "/\r|\n/", "", $res_template ); ?>');

                  $target.html("");
                  jQuery.each(games, function(i, game) {
                    var $el = $template.clone();
                    $el.find(".status").text(game.status);
                    $el.find(".team.home .name").text(game.home.market + " " + game.home.name);
                    $el.find(".team.home .runs").text(game.home.runs + ' /');
                    $el.find(".team.home .logo img").attr("src", "<?php echo get_template_directory_uri(); ?>/assets/imgs/mlb/"+ game.home.abbr + "-logo-sm.png");

                    $el.find(".team.away .name").text(game.away.market + " " + game.away.name);
                    $el.find(".team.away .runs").text(game.home.runs);
                    $el.find(".team.away .logo img").attr("src", "<?php echo get_template_directory_uri(); ?>/assets/imgs/mlb/"+ game.away.abbr + "-logo-sm.png");

                    $target.append($el);
                  });
                },
                function (err) { console.log( err ); }
              );
            }
          }  

          function processTab (selectedTab) {
            switch ( selectedTab ) {
              case "#resultados":
                  getResultados( selectedTab );
                  break;
              case "#calendario":
                  //getCalendario(selectedTab);
                  break;
              case "#posiciones":
                  //getPosiciones(selectedTab);
                  break;
              case "#estadisticas":
                  //getEstadisticas(selectedTab);
                  break;
              case "#principal":
              default:
                return;
            }
          }

          var initLigasMenu = function () {
            var $allMenuItems = jQuery("#menu-deportes").find("li.menu-item");
            var $allTabs = jQuery(".container-fluid.tabs");
            $allMenuItems.click(function(e) {
              var $currentMenuItem = jQuery(e.currentTarget);
              var link = $currentMenuItem.find("a").attr("href");
              var $currentTab = jQuery(link+"-tab");

              $allMenuItems.removeClass("active");
              $currentMenuItem.addClass("active");

              $allTabs.addClass("hidden");
              $currentTab.removeClass("hidden");
              if("#principal" === link) {
                jQuery(".marcador-hero-post").removeClass("hidden");
              } else {
                jQuery(".marcador-hero-post").addClass("hidden");
              }

              processTab(link);
            });

            loadLigas();
          };

          var loadLigas = function() {
            <?php //if (count ($cat_objs) < 1): ?>
            //jQuery( "#liga-drpdwn" ).hide();
            <?php //else: ?>
            jQuery( "#liga-drpdwn" ).change(onOptionSelected);
            //var ligas = <?php echo json_encode($cat_objs); ?>;
            //jQuery( "#liga-select" ).append(
            //  getDropDownList("liga-select", "liga-drpdwn", ligas)
            //);

            <?php //endif; ?>
          };

          return {
            init: initLigasMenu,
            load: loadLigas
          };
        })();

        return APP;
      }( MARCADOR || {} ));

      jQuery( "#menu-deportes" ).ready( MARCADOR.Estadisticas.init );
      <?php //endif; ?>
    </script>

<?php else: ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-lg-9">
        <!-- Marcador posts -->
        <div class="marcador-posts-listing-wrapper cards">
          <div class="container-fluid">
            <div class="row">
              <h1>Sin resultados</h1>
            </div>
          </div>
        </div>
        <!-- .marcador-posts-listing -->
      </div> 
    </div>
  </div>
<?php endif; ?>
<?php get_footer(); ?>