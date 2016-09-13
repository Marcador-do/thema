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
  $data = explode("/",$_SERVER['REQUEST_URI']); 
  $disciplina = $data[2]; // Ex: baloncesto
  if (count($data) > 4) $liga = $data[3]; // Ex: nba
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
if (!isset($liga)) {
  $category = get_category_by_slug( $disciplina );
  if ($category !== false) {
    $disciplina_id = $category->cat_ID;
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
  }
} else {
  $liga_id = get_category_by_slug( $liga )->cat_ID;
  if ($category !== false) array_push($cat_ids, $liga_id);
}

if (count($cat_ids) > 0) {
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
} ?>

<?php if ($principal): while ( $principal->have_posts() ): $principal->the_post(); ?>

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

                <div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
                <div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
              </div>
            </div>
            <!-- .marcador-posts-listing -->
          </div> 
      </div>
    </div>


  <div id="resultados-tab" class="container-fluid tabs hidden">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-lg-9">
        <!-- Marcador posts -->
        <div class="marcador-posts-listing-wrapper cards">
          <div class="container-fluid">
            <div class="row">

              <div class="col-xs-12">
                <div class="container-fluid game-list">
                  <!-- Game
                  <div class="row game" style="height: 100px; box-shadow: 0 0 5px #3d3d3d; border-radius: 5px; margin-bottom: 20px;">

                    <div class="col-xs-10 col-sm-10 col-lg-10" style="height: 100%; background-color: #fff;border-bottom-left-radius: 5px; border-top-left-radius: 5px;">
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
                    <div class="col-xs-2 col-sm-2 col-lg-2" style="height: 100%; color: #d3d3d3; background-color: #3d3d3d; border-bottom-right-radius: 5px; border-top-right-radius: 5px;">DETALLES</div>

                  </div>
                  End Game -->
<?php
$res_template = <<<STAT_TEMPLATE
<div class="row game" style="height: 100px; box-shadow: 0 0 5px #3d3d3d; border-radius: 5px; margin-bottom: 20px;">
  <div class="col-xs-10 col-sm-10 col-lg-10" style="height: 100%; background-color: #fff;border-bottom-left-radius: 5px; border-top-left-radius: 5px;">
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
  <div class="col-xs-2 col-sm-2 col-lg-2" style="height: 100%; color: #d3d3d3; background-color: #3d3d3d; border-bottom-right-radius: 5px; border-top-right-radius: 5px;">DETALLES</div>
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
        <div class="marcador-posts-listing-wrapper cards">
          <div class="container-fluid">
            <div class="row">
              <h1>Calendario</h1>
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
    <?php if (isset($cat_objs)): ?>
      var MARCADOR = (function( APP ){

        /**
         * Estadisticas Namespace
         */
        APP.Estadisticas = (function () {

          function getDropDownList(name, id, optionList) {
            var combo = jQuery("<select class='form-control'></select>").attr("id", id).attr("name", name);
            jQuery.each(optionList, function (i, el) {
              combo.append("<option value='" + el.id + "'>" + el.name + "</option>");
            });
            return combo;
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
                    $el.find(".team.home .runs").text(game.home.runs);
                    $el.find(".team.home .logo img").attr("src", "/wp-content/themes/marcadordo/assets/imgs/mlb/"+game.home.abbr + "-logo-sm.png");

                    $el.find(".team.away .name").text(game.away.market + " " + game.away.name);
                    $el.find(".team.away .runs").text(game.home.runs);
                    $el.find(".team.away .logo img").attr("src", "/wp-content/themes/marcadordo/assets/imgs/mlb/"+game.away.abbr + "-logo-sm.png");

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
            <?php if (count ($cat_objs) < 1): ?>
            console.log(jQuery( "#liga-select" ));
            jQuery( "#liga-select" ).hide();
            <?php else: ?>
            var ligas = <?php echo json_encode($cat_objs); ?>;
            jQuery( "#liga-select" ).append(
              getDropDownList("liga-select", "liga-drpdwn", ligas)
            );

            <?php endif; ?>
          };

          return {
            init: initLigasMenu,
            load: loadLigas
          };
        })();

        return APP;
      }( MARCADOR || {} ));

      jQuery( "#menu-deportes" ).ready( MARCADOR.Estadisticas.init );
      <?php endif; ?>
    </script>

<?php else: ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-lg-9">
        <!-- Marcador posts -->
        <div class="marcador-posts-listing-wrapper cards">
          <div class="container-fluid">
            <div class="row">
              <h1>Nothing found</h1>
            </div>
          </div>
        </div>
        <!-- .marcador-posts-listing -->
      </div> 
    </div>
  </div>
<?php endif; ?>
<?php get_footer(); ?>