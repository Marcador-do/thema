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
<div class="scrolling-menu">
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
<div class="fadeOut left"></div><div class="fadeOut right"></div>
</div>
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
<div id="marcador-page-template">
<div class="container-fluid">
    
    <div class="row">
        <!-- MAIN CONTENT SECTION STARTS HERE-->
    <div class="col-md-12 col-lg-9">
        
        <!-- DISPLAY HERO POST -->
        <?php if ( $principal ): 
	while ( $principal->have_posts() ): $principal->the_post(); ?>
	<?php if ( $principal->current_post === 0 ): ?>
		<?php if ( get_post_type() === "marcador_partido" ): ?>
			<?php include (get_template_directory() . "/includes/marcador_hero_post_score.include.php"); ?>
		<?php else: ?>
			<?php include (get_template_directory() . "/includes/marcador_hero_post.include.php"); ?>
		<?php endif; ?>
         <!--/ DISPLAY HERO POST -->
        
        <div id="principal-tab" class="row tabs">
						<!-- Marcador posts -->
						<div class="marcador-posts-listing-wrapper cards">
	<?php continue; endif; ?>
									<?php include (get_template_directory() . "/includes/marcador_hero_post_list_item.include.php"); ?>
<?php endwhile; ?>
										
								<nav aria-label="..." class="col-lg-offset-1 col-md-offset-1 col-lg-9 col-md-9">
									<ul class="pager">
										<?php if ($paged < $max_pages): ?>
											<li class="previous"><?php next_posts_link( '<span aria-hidden="true">&larr;</span> Entradas Anteriores' ); ?></li>
										<?php endif; ?>
											<li class="next"><?php previous_posts_link( 'Entradas Recientes <span aria-hidden="true">&rarr;</span>' ); ?></li>
									</ul>
								</nav>

							
						</div>
						<!-- .marcador-posts-listing -->
		</div>
        
        <div id="resultados-tab" class="row tabs hidden">
		
				<h3>Partidos</h3>
			
				<!-- Marcador posts -->
				<div class="marcador-posts-listing-wrapper cards">
                            <div class="col-xs-12 col-sm-4">
                                <div class="resultados-marcador input-group date">
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon">
                                        <i class="material-icons">today</i>
                                        <i class="material-icons">expand_more</i>
                                    </span>
                                </div>
                            </div>
                        </div>

							<div class="col-xs-12">
								<div class="game-list">
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
				
				<!-- .marcador-posts-listing -->
			
		
	</div>
        
        <div id="calendario-tab" class="row tabs hidden">
						<div class="col-xs-12">
							<h1>Calendario</h1>
						</div>
				<!-- Marcador posts -->
				<div class="calendar-list">
						<div class="col-xs-12 col-sm-4">
							<div class="calendario-marcador input-group date">
								<input type="text" class="form-control"><span class="input-group-addon"><i class="material-icons">today</i><i class="material-icons">expand_more</i></span>
							</div>
						</div>
                    
					<!-- Calendar -->
<?php $cal_template = <<<STAT_TEMPLATE
                    <div class="calendar-row">
                        <div class="col-lg-12">
                            <div class="calendar-day">
                                13 de Julio, 2016
                            </div>
                            <div class="calendar-content"></div>
                        </div>
                    </div>\n
STAT_TEMPLATE;
 ?>

<?php $cal_table_template = <<<STAT_TEMPLATE
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
                                    </tbody>
                                </table>\n
STAT_TEMPLATE;
?>
<?php $tpl=get_template_directory_uri() . '/'; ?>
<?php $cal_row_table_template = <<<STAT_TEMPLATE
                                        <tr class="calendar-row">
                                            <td class="away"><img src="" height="16" width="16"><span>Baltimore</span></td>
                                            <td class="home">Cubs</td>
                                            <td class="time">2:00 PM</td>
                                            <td class="away-pitcher">Martin Perez</td>
                                            <td class="home-pitcher">Kyle Hendricks</td>
                                        </tr>\n
STAT_TEMPLATE;
?>
        </div>
        <!-- .marcador-posts-listing -->
    
  </div>
        
        <div id="posiciones-tab" class="row tabs hidden">
    <div class="col-xs-12">
              <h1>STANDING</h1>
            </div>
        <!-- Marcador posts -->
       
          <div class="row calendar-row">
            <!-- Col 1 -->
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
              <div class="glosary">
                Glosary
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
              <!-- Col 2 -->
              <div class="status">
                <span class="status key">W:</span> <span class="status value w">Won Games</span>
              </div>
              <div class="status">
                <span class="status key">L:</span> <span class="status value l">Lost Games</span>
              </div>
              <div class="status">
                <span class="status key">PCT:</span> <span class="status value pct">Winning porcentage</span>
              </div>
            </div>
            <!-- Col 3 -->
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
              <div class="status">
                <span class="status key">Home/Visit:</span> <span class="status value home-visit">Won Games</span>
              </div>
              <div class="status">
                <span class="status key">EL:</span> <span class="status value el">Elimination Number</span>
              </div>
              <div class="status">
                <span class="status key">STRK:</span> <span class="status value pct">Streak</span>
              </div>
            </div>
            <!-- Col4 -->
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">
              <div class="status">
                <span class="status key">GB:</span> <span class="status value gb">Game Back</span>
              </div>
              <div class="status">
                <span class="status key">WCB:</span> <span class="status value l">Wild card back</span>
              </div>
              <div class="status">
                <span class="status key">U10:</span> <span class="status value pct">Last 10 Games Won vs Lost</span>
              </div>
            </div>
          </div>
          <!-- Table -->
          <div class="row calendar-row">
            <div class="col-xs-2">
              <h3 class="temporada color-red">Temporada</h3>
            </div>
            <div class="col-xs-10">
              <table>
                <tbody>
                  <tr>
                    <td><h3 class="temporada regular">Regular</h3></td>
                    <td>
                      <div class="switch-container">
                        <div class="switch">
                          <input id="cmn-toggle-2" class="cmn-toggle cmn-toggle-round" type="checkbox" selected>
                          <label for="cmn-toggle-2"></label>
                        </div>
                      </div><!-- /.switch -->
                    </td>
                    <td><h3 class="temporada post">Post</h3></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="col-xs-12 ligas">
<?php
$liga_table_title = <<<LIGA_TABLE_TITLE
                <div class="liga-title liga">Liga Americana</div>\n
LIGA_TABLE_TITLE;

$liga_table = <<<LIGA_TABLE
                <div class="liga-content">
                  <table class="table table-striped marcador-table">
                  </table>
                </div>\n
LIGA_TABLE;

$liga_table_head = <<<LIGA_TABLE_HEAD
                  <thead>
                    <tr>
                      <th class="liga-division">East</th>
                      <th>W</th>
                      <th>L</th>
                      <th>PCT</th>
                      <th>HOME</th>
                      <th>VISIT</th>
                      <th>STRK</th>
                      <th>GB</th>
                      <th>WCB</th>
                      <th>U10</th>
                      <th>EL</th>
                    </tr>
                  </thead>\n
LIGA_TABLE_HEAD;

$liga_table_body = <<<LIGA_TABLE_BODY
                  <tbody></tbody>\n
LIGA_TABLE_BODY;

$liga_table_row = <<<LIGA_TABLE_ROW
                    <tr>
                      <td class="liga-image"><img src="" height="16" width="16"><span>Baltimore</span></td>
                      <td class="liga-won">54</td>
                      <td class="liga-lost">36</td>
                      <td class="liga-pct">.600</td>
                      <td class="liga-home">25-28</td>
                      <td class="liga-visit">18-34</td>
                      <td class="liga-strk">W2</td>
                      <td class="liga-gb">427</td>
                      <td class="liga-wcb">+16</td>
                      <td class="liga-u10">3-7</td>
                      <td class="liga-el">44</td>
                    </tr>
LIGA_TABLE_ROW;
?>
            </div>
          </div>
       
        <!-- .marcador-posts-listing -->
  </div>
        
        <div id="estadisticas-tab" class="row tabs hidden">
	<div class="col-lg-12">
        <div class="estadisticas-heading">
						<div class="heading row">
							<div class="col-xs-2">
								<h3>
									<select name="year-estadistica" id="year-stadistica" class="form-control">
										<option>2016</option>
									</select>
								</h3>
							</div>
							<div class="col-xs-2">
								<h3 class="temporada">Líderes en</h3>
							</div>
							<div class="col-xs-6">
								<table>
									<tbody>
									<tr>
										<td><h3 class="temporada regular">Bateo</h3></td>
										<td>
											<div class="switch-container">
												<div class="switch">
													<input id="cmn-toggle-3" class="cmn-toggle cmn-toggle-round" type="checkbox">
													<label for="cmn-toggle-3"></label>
												</div>
											</div><!-- /.switch -->
										</td>
										<td><h3 class="temporada post">Pitcheo</h3></td>
									</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
                    
        <div class="estadisticas-content">
						<div class="row content">
<?php
$est_column = <<<EST_COLUMN
<div class="col-lg-6"></div>\n
EST_COLUMN;

$est_column_title = <<<EST_COLUMN_TITLE
<div class="liga"></div>\n
EST_COLUMN_TITLE;

$est_column_body = <<<EST_COLUMN_BODY
<div class="container-fluid"></div>\n
EST_COLUMN_BODY;

$est_column_body_section = <<<EST_COLUMN_BODY_SECTION
<div class="row row-table-static">
    <div class="col-xs-4 player-image-col" style="background-image: url(\"http://placehold.it/500x700&text=Marcador+Player\");"></div>
    <div class="col-xs-8 players-col">
        <div class="panel panel-default panel-players">
            <div class="panel-heading players-section">Players section</div>
            <div class="panel-body lead-player">
                <table class="table">
                    <tbody>
                    <tr>
                        <td class="name">Robinson Saltalamacchia</td>
                        <td class="abbr">AL</td>
                        <td class="pct">.360</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="panel-body other-players no-collapse">
                <table class="table marcador-table">
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="panel-body other-players collapse" id="collapsabletable1">
                <table class="table marcador-table">
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="panel-footer expand-more">
                <button class="btn btn-default btn-block" type="button" data-toggle="collapse" data-target="#collapsabletable<?php echo $table; ?>" aria-expanded="false" aria-controls="collapsabletable<?php echo $table; ?>">
                    Ver más <i class="material-icons">expand_more</i>
                </button>
            </div>
        </div>
    </div>
</div>\n
EST_COLUMN_BODY_SECTION;

$est_column_body_section_row = <<<EST_COLUMN_BODY_SECTION_ROW
<tr>
    <td class="rank">1.</td>
    <td class="name">Murphy</td>
    <td class="abbr">BOS</td>
    <td class="pct">.356</td>
</tr>
EST_COLUMN_BODY_SECTION_ROW;
?>
							<?php /*<div class="col-lg-6">
								<div class="liga americana">
									Liga Americana
								</div>
								<div class="container-fluid">
									<?php for ( $table=1; $table < 5; $table++ ): ?>
										<div class="row row-table-static">
											<div class="col-xs-4 player-image-col" style="background-image: url('http://placehold.it/500x700&text=Marcador+Player');"></div>
											<div class="col-xs-8 players-col">
												<div class="panel panel-default panel-players">
													<div class="panel-heading players-section">
														Players section
													</div>
													<div class="panel-body lead-player">
														<table class="table">
															<tbody>
															<tr>
																<td>
																	Robinson Saltalamacchia
																</td>
																<td>
																	AL
																</td>
																<td>
																	.360
																</td>
															</tr>
															</tbody>
														</table>
													</div>
													<div class="panel-body other-players">
														<table class="table marcador-table">
															<tbody>
															<?php for ($row=2; $row < 5; $row++): ?>
																<tr>
																	<td>
																		<?php echo $row; ?>.
																	</td>
																	<td>
																		Murphy
																	</td>
																	<td>
																		BOS
																	</td>
																	<td>
																		.356
																	</td>
																</tr>
															<?php endfor; ?>
															</tbody>
														</table>
													</div>
													<div class="panel-body other-players collapse" id="collapsabletable<?php echo $table; ?>">
														<table class="table marcador-table">
															<tbody>
															<?php for ($row=5; $row < 11; $row++): ?>
																<tr>
																	<td>
																		<?php echo $row; ?>.
																	</td>
																	<td>
																		Murphy
																	</td>
																	<td>
																		BOS
																	</td>
																	<td>
																		.356
																	</td>
																</tr>
															<?php endfor; ?>
															</tbody>
														</table>
													</div>
													<div class="panel-footer expand-more">
														<button class="btn btn-default btn-block" type="button" data-toggle="collapse" data-target="#collapsabletable<?php echo $table; ?>" aria-expanded="false" aria-controls="collapsabletable<?php echo $table; ?>">
															Ver más <i class="material-icons">expand_more</i>
														</button>
													</div>
												</div>
											</div>
										</div>
									<?php endfor; ?>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="liga nacional">
									Liga Nacional
								</div>
								<div class="container-fluid">
									<?php for ( $table=1; $table < 5; $table++ ): ?>
										<div class="row row-table-static">
											<div class="col-xs-4 player-image-col" style="background-image: url('http://placehold.it/500x700&text=Marcador+Player');"></div>
											<div class="col-xs-8 players-col">
												<div class="panel panel-default panel-players">
													<div class="panel-heading players-section">
														Players section
													</div>
													<div class="panel-body lead-player">
														<table class="table">
															<tbody>
															<tr>
																<td>
																	Robinson Saltalamacchia
																</td>
																<td>
																	AL
																</td>
																<td>
																	.360
																</td>
															</tr>
															</tbody>
														</table>
													</div>
													<div class="panel-body other-players">
														<table class="table marcador-table">
															<tbody>
															<?php for ($row=2; $row < 5; $row++): ?>
																<tr>
																	<td>
																		<?php echo $row; ?>.
																	</td>
																	<td>
																		Murphy
																	</td>
																	<td>
																		BOS
																	</td>
																	<td>
																		.356
																	</td>
																</tr>
															<?php endfor; ?>
															</tbody>
														</table>
													</div>
													<div class="panel-body other-players collapse" id="collapsabletablenacional<?php echo $table; ?>">
														<table class="table marcador-table">
															<tbody>
															<?php for ($row=5; $row < 11; $row++): ?>
																<tr>
																	<td>
																		<?php echo $row; ?>.
																	</td>
																	<td>
																		Murphy
																	</td>
																	<td>
																		BOS
																	</td>
																	<td>
																		.356
																	</td>
																</tr>
															<?php endfor; ?>
															</tbody>
														</table>
													</div>
													<div class="panel-footer expand-more">
														<button class="btn btn-default btn-block" type="button" data-toggle="collapse" data-target="#collapsabletablenacional<?php echo $table; ?>" aria-expanded="false" aria-controls="collapsabletablenacional<?php echo $table; ?>">
															Ver más <i class="material-icons">expand_more</i>
														</button>
													</div>
												</div>
											</div>
										</div>
									<?php endfor; ?>
								</div>*/ ?>
							</div>
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

          var resultados = {};

          function onOptionSelected(event) {
            var selected = jQuery(this).val();
            if (selected.length < 1) return; 

            var toLiga = window.location.pathname + selected;
            window.location = selected;
            // console.log(toLiga);
            // console.log(<?php echo json_encode($parents); ?>);
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

            /**
             * Resultados Tab
             *
             * @param target
             */
          function getResultados (target, pickedDate) {
            $target = jQuery(target + "-tab").find(".game-list");
            if (APP.ajax) {
              var now = pickedDate || Date.now();
              var payload = { action: "resultados", league: "mlb", date: buildDateString( now ) };
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
                    $el.find(".team.away .runs").text(game.away.runs);
                    $el.find(".team.away .logo img").attr("src", "<?php echo get_template_directory_uri(); ?>/assets/imgs/mlb/"+ game.away.abbr + "-logo-sm.png");

                    $target.append($el);
                  });
                },
                function (err) { console.log( err ); }
              );
            }
          }

            /**
             * Calendario Tab
             *
             * @param target
             */
          function calendarioBuilder (data) {
            var dateProcesed = this.data.split('=');
                dateProcesed = dateProcesed[dateProcesed.length-1];
            var calendario = data.calendario;
            var $cal_day = jQuery('<?php echo preg_replace( "/\r|\n/", "", $cal_template ); ?>');
            var $el = null;

            if (calendario.length === 0) {
              $el = $cal_day.clone();
              $el.find(".calendar-day").text(dateFormat(dateProcesed));
              $el.find(".calendar-content").text("No juegos agendados para este día");
              $target.append($el);
              return;
            }

            var $cal_table = jQuery('<?php echo preg_replace( "/\r|\n/", "", $cal_table_template ); ?>');
            var $cal_row = jQuery('<?php echo preg_replace( "/\r|\n/", "", $cal_row_table_template ); ?>');
            $el = $cal_day.clone();
            $el.find(".calendar-day").text(dateFormat(dateProcesed));
            var $tbl = $cal_table.clone();
            jQuery.each(calendario, function(i, day) {
              var $row_el = $cal_row.clone();
              <?php $tpl=get_template_directory_uri() . '/'; ?>
              $row_el.find(".away img").attr("src", "<?php echo $tpl; ?>assets/imgs/mlb/"+day.away.abbr+"-logo-sm.png");
              $row_el.find(".away span").html(day.away.name);
              $row_el.find(".home").text(day.home.name);
              $row_el.find(".time").text(getDateTime(day.scheduled));
              $row_el.find(".away-pitcher").text(day.away.pitcher);
              $row_el.find(".home-pitcher").text(day.home.pitcher);

              $tbl.append($row_el);
            });
            $el.find(".calendar-content").append($tbl);
            $target.append($el);
          }

          function calendarioAjaxError (error) {
            console.log(error);
          }

          function getCalendario (target, pickedDate) {
            if (APP.ajax) {
              var now = pickedDate || Date.now();
              resultados.selectedDays = { max: now, mid: now - (3600*24*1*1000), min: now - (3600*24*2*1000)};
console.log('NOW: '+new Date(resultados.selectedDays.max), 'NOW(-1): '+new Date(resultados.selectedDays.mid),  'NOW(-1): '+new Date(resultados.selectedDays.min));
              $target = jQuery(target + "-tab").find(".calendar-list");
              jQuery("#calendario-tab .calendar-row").remove();
              var max = { action: "calendario", league: "mlb", date: buildDateString( resultados.selectedDays.max ) };
              var mid = { action: "calendario", league: "mlb", date: buildDateString( resultados.selectedDays.mid ) };
              var min = { action: "calendario", league: "mlb", date: buildDateString( resultados.selectedDays.min ) };

              APP.ajax( max, calendarioBuilder, calendarioAjaxError )
                 .done( function() { APP.ajax(mid, calendarioBuilder, calendarioAjaxError)
                     .done( function() { APP.ajax(min, calendarioBuilder, calendarioAjaxError)} )
                 } );
            }
          }

          function dateFormat(stringDate) {
            var monthNames = [
              "Enero", "Febrero", "Marzo",
              "Abril", "Mayo", "Junio", "Julio",
              "Agosto", "Septiembre", "Octubre",
              "Noviembre", "Diciembre"
            ];
            stringDate = stringDate.split('-');
            var date = new Date(
                Date.UTC(
                    parseInt(stringDate[0]),    // Año
                    parseInt(stringDate[1])-1,  // Mes [0 - 11]
                    parseInt(stringDate[2]),    // Dia
                    4                           // Uso Horario
                )
            );
            var day = date.getDate();
            var monthIndex = date.getMonth();
            var year = date.getFullYear();
            return day + " de " + monthNames[monthIndex] + ", " + year;
          }

          function getDateTime(stringDate) {
            var date = new Date(stringDate);
            var time = date.toTimeString();
            return "" + time;
          }

          function buildDateString(timestamp) {
            var today = new Date(timestamp);
            var year = today.getFullYear();
            var monthRaw = today.getMonth()+1;
            var month = (monthRaw < 10) ? "0" + monthRaw : monthRaw;
            var day = (today.getDate() < 10) ? "0"+today.getDate() : today.getDate();
              console.log(year + "-" + month + "-" + day);
            return year + "-" + month + "-" + day;
          }

            /**
             * Posiciones Tab
             *
             * @param target
             */
          function getPosiciones(target) {
                if (APP.ajax) {
                    var $target = jQuery(target + "-tab").find(".ligas");
                    var options = {
                        action: "posiciones",
                        league: "mlb",
                        season: (jQuery('#cmn-toggle-2')[0].checked) ? "PST" : 'REG',
                        date: buildDateString( Date.now() )
                    };

                    APP.ajax(
                        options,
                        function (data) {console.log(data); buildPosicionesTable($target, data.league.season)},
                        function (error) {console.log(error);}
                    );
                }
          }

          function buildPosicionesTable ($target, season) {
              var $liga_table = jQuery('<?php echo preg_replace( "/\r|\n/", "", $liga_table ); ?>');
              var $liga_table_title = jQuery('<?php echo preg_replace( "/\r|\n/", "", $liga_table_title ); ?>');
              var $liga_table_head = jQuery('<?php echo preg_replace( "/\r|\n/", "", $liga_table_head ); ?>');
              var $liga_table_body = jQuery('<?php echo preg_replace( "/\r|\n/", "", $liga_table_body ); ?>');
              var $liga_table_row = jQuery('<?php echo preg_replace( "/\r|\n/", "", $liga_table_row ); ?>');

              $target.html('');
              if (!season.leagues) {
                  $target.append($liga_table.html('No informacion disponible para esta temporada.'))
              }

              jQuery.each(season.leagues, function (i, league) {
                  var $table_title_instance = $liga_table_title.clone();
                  $table_title_instance.text(league.name);
                  if('NL' === league.alias) $table_title_instance.addClass("nacional");
                  if('AL' === league.alias) $table_title_instance.addClass("americana");

                  var $table_instance = $liga_table.clone();
                  var $table_head_instance = null;
                  var $table_body_instance = null;
                  var $table_row_instance = null;
                  jQuery.each(league.divisions, function(j, division) { //console.log(division);
                      $table_head_instance = $liga_table_head.clone();
                      $table_head_instance.find(".liga-division").text(division.name);

                      $table_body_instance = $liga_table_body.clone();
                      jQuery.each(division.teams, function (k, team) {
                          $table_row_instance = $liga_table_row.clone();

                          $table_row_instance.find(".liga-image img").attr('src', "<?php echo $tpl; ?>assets/imgs/mlb/"+team.abbr+"-logo-sm.png");
                          $table_row_instance.find(".liga-image span").text(team.name);
                          $table_row_instance.find(".liga-won").text(team.win);
                          $table_row_instance.find(".liga-lost").text(team.loss);
                          $table_row_instance.find(".liga-pct").text(team.win_p);
                          $table_row_instance.find(".liga-home").text(team.home_win +"-"+ team.home_loss);
                          $table_row_instance.find(".liga-visit").text(team.away_win +"-"+ team.away_loss);
                          $table_row_instance.find(".liga-strk").text(team.streak);
                          $table_row_instance.find(".liga-gb").text(team.games_back);
                          $table_row_instance.find(".liga-wcb").text(team.wild_card_back);
                          $table_row_instance.find(".liga-u10").text(team.last_10_won +"-"+ team.last_10_lost);
                          $table_row_instance.find(".liga-el").text(team.elimination_number);

                          $table_body_instance.append($table_row_instance);
                      });

                      var $current = $table_instance.find("table.marcador-table");
                      $current.append($table_head_instance);
                      $current.append($table_body_instance);
                  });

                  $target.append($table_title_instance);
                  $target.append($table_instance);
              });
          }

          function onPosicionesTemporadaSelected (e) {
            console.log(e);
            getPosiciones('#posiciones');
          }

            /**
             * Estadisticas Tab
             *
             * @param target
             */
            function getEstadisticas(target) {
                if (APP.ajax) {
                    var $target = jQuery(target + "-tab").find(".estadisticas-content.container-fluid .row.content");
                    var options = {
                        action: "estadisticas",
                        league: "mlb",
                        season: 'REG',
                        date: buildDateString( Date.now() )
                    };

                    APP.ajax(
                        options,
                        function (data) { console.log(data); buildEstadisticasTable($target, data.estadisticas); },
                        function (error) {console.log(error);}
                    );
                }
            }

            function buildEstadisticasTable ($target, estadisticas) {
                var $est_column = jQuery('<?php echo preg_replace( "/\r|\n/", "", $est_column ); ?>');
                var $est_column_title = jQuery('<?php echo preg_replace( "/\r|\n/", "", $est_column_title ); ?>');
                var $est_column_body = jQuery('<?php echo preg_replace( "/\r|\n/", "", $est_column_body ); ?>');
                var $est_column_body_section = jQuery('<?php echo preg_replace( "/\r|\n/", "", $est_column_body_section ); ?>');
                var $est_column_body_section_row = jQuery('<?php echo preg_replace( "/\r|\n/", "", $est_column_body_section_row ); ?>');

                $target.html('');
                var $column = null;
                var count =1;
                var checked = jQuery("#cmn-toggle-3")[0].checked;
                jQuery.each(estadisticas, function (i, estadistica) {
                    $column = $est_column.clone();

                    $column_title = $est_column_title.clone();
                    $column_title.text(estadistica.name);
                    $column_title.addClass( (estadistica.alias === 'AL')?'americana':'nacional' );
                    $column.append($column_title);

                    $column_body = $est_column_body.clone();
                    var currentSelected = (!checked)?estadistica.hitting : estadistica.pitching;
                    var currentKeys = Object.keys(currentSelected);
                    jQuery.each(currentKeys, function (j, section) {
                        $column_body_section = $est_column_body_section.clone();
                        $column_body_section.find('.panel-heading.players-section').text(section.replace(/_/g,' ',true).toUpperCase());

                        var collapsableId = 'collapsabletable'+(count);
                        $column_body_section.find('.panel-body.other-players.collapse').attr('id', collapsableId);
                        $column_body_section.find('.btn.btn-default.btn-block').attr('data-target', '#'+collapsableId);
                        $column_body_section.find('.btn.btn-default.btn-block').attr('aria-controls', collapsableId);

                        jQuery.each(currentSelected[section], function (k, player) {
                            var name = player.first_name + ' ' + player.last_name;
                            var pct = "" + (player.avg || player.hr || player.rbi || player.h || player.sb || player.era || player[section]);
                            var abbr = (player.team) ? player.team.abbr : " - ";

                            if (k === 0) {
                                $column_body_section.find('.panel-body.lead-player table tbody .name').text(name);
                                $column_body_section.find('.panel-body.lead-player table tbody .pct').text(pct);
                                $column_body_section.find('.panel-body.lead-player table tbody .abbr').text(abbr);
                                return;
                            }

                            $column_body_section_row = $est_column_body_section_row.clone();

                            $column_body_section_row.find('.rank').text(player.rank + '.');
                            $column_body_section_row.find('.name').text(name);
                            $column_body_section_row.find('.pct').text(pct);
                            $column_body_section_row.find('.abbr').text(abbr);
                            if (k < 4) {
                                $column_body_section.find('.panel-body.other-players.no-collapse table tbody')
                                                    .append($column_body_section_row);
                            } else if(k >= 4) {
                                $column_body_section.find('.panel-body.other-players.collapse table tbody')
                                                    .append($column_body_section_row);
                            }
                        });
                        count++;

                        $column_body.append($column_body_section);
                    });
                    $column.append($column_body);

                    $target.append($column);
                });
            }

            function onEstadisticasLiderEnSelected (e) {
                console.log(e);
                getEstadisticas('#estadisticas');
            }

          function processTab (selectedTab) {
            switch ( selectedTab ) {
              case "#resultados":
                  getResultados( selectedTab );
                  break;
              case "#calendario":
                  getCalendario(selectedTab);
                  break;
              case "#posiciones":
                  getPosiciones(selectedTab);
                  break;
              case "#estadisticas":
                  getEstadisticas(selectedTab);
                  break;
              case "#principal":
              default:
                return;
            }
          }

          var initLigasMenu = function () {
            var $allMenuItems = jQuery("#menu-deportes").find("li.menu-item");
            var $allTabs = jQuery(".container-fluid.tabs");
            var $calendarioDatepicker = jQuery('.calendario-marcador.input-group.date');
            var $resultadosDatepicker = jQuery('.resultados-marcador.input-group.date');
            var datepickerOptions = {
                format: "dd/mm/yyyy",
                weekStart: 0,
                language: "es",
                orientation: "bottom left",
                todayHighlight: true,
            };

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

              $calendarioDatepicker.datepicker(datepickerOptions);
              $resultadosDatepicker.datepicker(datepickerOptions);
              $calendarioDatepicker.find('input').change(function () {
                  var pickedDate = jQuery(this).val().split('/');
                  pickedDate = Date.UTC(pickedDate[2], parseInt(pickedDate[1])-1, pickedDate[0], 4);
                  console.log(new Date(pickedDate));
                  getCalendario("#calendario", pickedDate);
              });

              $resultadosDatepicker.find('input').change(function () {
                  var pickedDate = jQuery(this).val().split('/');
                  pickedDate = Date.UTC(pickedDate[2], parseInt(pickedDate[1])-1, pickedDate[0], 4);
                  console.log(new Date(pickedDate));
                  getResultados("#resultados", pickedDate);
              });

            loadLigas();
          };

          var loadLigas = function() {
            <?php //if (count ($cat_objs) < 1): ?>
            //jQuery( "#liga-drpdwn" ).hide();
            <?php //else: ?>
            jQuery( "#liga-drpdwn" ).change(onOptionSelected);
            jQuery( "#cmn-toggle-2" ).change(onPosicionesTemporadaSelected);
            jQuery( "#cmn-toggle-3" ).change(onEstadisticasLiderEnSelected);
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
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.kinetic.min.js"></script>
                    <script>
                    jQuery(document).ready(function(){
                       //Add up al elements width and assign it to the UL container
                        menuW = 0;
                        
                        jQuery("#menu-deportes li").each(function(){
                          menuW +=  parseInt(jQuery(this).css('width'));
                        });
                        jQuery("menu-deportes").css('width',menuW+50);
                        
                         //Display fadeOuts if there are hidden elements to the right
                                               
                        if(jQuery("#marcador-navbar-submenu").width() < jQuery("#menu-deportes").width()){
                            jQuery(".fadeOut.right").fadeIn(150);
                        }
                        
                        //Hide or Show fadeOuts on scroll min/max positions
                        jQuery("#marcador-navbar-submenu").scroll(function(){
                           scrollOffset = jQuery("#marcador-navbar-submenu").scrollLeft();
                            if(scrollOffset <= 15){
                            jQuery(".fadeOut.left").fadeOut(150);
                        }else{jQuery(".fadeOut.left").fadeIn(150);}
                            
                             if(scrollOffset >= menuW-jQuery("#marcador-navbar-submenu").width()){
                            jQuery(".fadeOut.right").fadeOut(150);
                        }else{jQuery(".fadeOut.right").fadeIn(150);}
                        });
                                                
                        //Make the menu scrollable/draggable
                       jQuery("#marcador-navbar-submenu").kinetic();
                    });
                    </script>
        <?php else: ?>
					<!-- Marcador posts -->
				<div class="marcador-posts-listing-wrapper cards">
					<div class="row">
						<div class="col-lg-12">
							<h1>Sin resultados</h1>
						</div>
					</div>
				</div>
				<!-- .marcador-posts-listing -->
			
<?php endif; ?>
    </div>
<!-- MAIN CONTENT SECTION ENDS HERE -->
        <?php get_sidebar(); ?>
    </div>
</div>
</div>

<?php get_footer(); ?>

		

	


  



		



