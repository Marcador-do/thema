<?php  
/**
 * [page.php]
 *
 * Page template.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @author  Ronnie Baez <ronnie.baez@gmail.com>
 * @package marcadordo
 */
?>
<?php get_header(); ?>
<script>
        jQuery("#comments").ready(function(){
            jQuery("#comments-toggle").click(function(){
                console.log("Comments toggled");
                jQuery("#comments").toggleClass(
"toggled");
            });
        });
        </script>
<div id="marcador-page-template">
  <div id="main-content" class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        
    <div id="resumen">
        
    <div class="row header_score">
            <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-header">Minnesota vs. Athetics Agosto 01, 2016</div>
                <div class="panel-body">
            <div class="row">
            <div class="col-xs-3 col-sm-4 team"><div>Minnesota Twins</div></div>
            <div class="logos col-xs-2 col-sm-1"><span class="logo mlb-min"></span></div>
            <div class="col-xs-2 col-sm-2 score">15/10</div>
            <div class="logos col-xs-2 col-sm-1"><span class="logo mlb-oak"></span></div>
            <div class="col-xs-3 col-sm-4 team"><div>Oakland Athletics</div></div>
            </div>
                </div>
            </div>
       </div>
        </div>
        
    <div id="hero-video-post" class="row">
        <div class="col-xs-12">
            <div class="single-post-featured-image" style="background-image: url('http://dev.marcador.do/wp-content/uploads/2016/09/Captura-de-pantalla-2016-09-22-a-las-23.00.10.png')"></div>
<div class="single-post-featured-image-description">
Rays de Tampa</div>
<div class="single-post-title-content">
<h1 class="single-post-title">Tampa lanzan blanqueada e impiden barrida ante Yankees</h1>									</div>
<div class="single-post-meta-content">
<div class="single-post-list-author">
<a href="http://dev.marcador.do/author/jose/">Por: Cesar Marchena</a>										</div>
<div class="single-post-list-date">
<a href="http://dev.marcador.do/2016/09/22/">
<div class="meta-divisor"></div>Sep 22, 2016		</a> 
</div>
									</div>
									<div class="single-post-content">

<p>Blake Snell y el bullpen de los Rays de Tampa Bay se combinaron para dejar en los senderos 11 corredores de Nueva York en la victoria el jueves por 2-0 que impidió una muy necesitada barrida de los Yankees en la serie de tres juegos.</p>
<p>Nueva York no logró conectar imparable en ocho ocasiones al bate con corredores en posición de anotar, incluyendo en siete veces ante Snell. Los Yankees iniciaron la jornada dos juegos y medio atrás de Baltimore en la lucha por el segundo boleto de comodín de la Liga Americana y también están debajo de Seattle, Houston y Detroit.</p>
<p>Snell (6-8) permitió cinco hits y concedió tres bases por bolas. New York tuvo amenazas de anotación contra él en cuatro de cinco entradas, y dejaron la casa llena en el tercer episodio cuando Chase Headley fue dominado en un elevado. Headley regresó a la alineación de Nueva York después de perderse tres juegos debido a rigidez en la espalda.</p>
<p>Chase Whitley, en su tercer juego desde que regresó de una cirugía de reconstrucción de ligamento en el codo, recibió dos imparables en dos entradas y dos tercios, y Alex Colomé terminó la labor para obtener su 35to salvamento en 37 oportunidades.</p>
<p>Por los Yankees, el dominicano Gary Sánchez de 2-0, con dos boletos. El colombiano Donovan Solano de 2-0. El venezolano Ronald Torreyes de 1-0.</p>
<p>Por los Rays, el venezolano Juniel Querecuto de 3-0.</p>
									</div>
															</div>
        </div>
        
    <div id="estadisticas" class="row">        
            <div class="col-xs-12"><h4>Estadisticas del Partido</h4></div>
        
            <div class="col-xs-12">
                <div id="stats" class="panel panel-default">
                <table class="stats">
                    <tr><th>bien</th><th>1</th><th>2</th><th>3</th><th>4</th><th>5</th><th>6</th><th>7</th><th>8</th><th>9</th><th>10</th><th>R</th><th>H</th><th>E</th></tr>
                    <tr><td>Baltimore</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td></tr>
                    <tr><td>Minnesota</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td></tr>
                    </table>
                </div>
            </div>
        </div>
        
    <div id="imagenes" class="row">
        <script>
        jQuery("#imagenes-slider").ready(function () { 
    var thumbnail_scroll;
    
    function sliderScroll(scroll){
        console.log("Sliding");
        positionX = jQuery("#imagenes-slider .thumbnails").scrollLeft();
        jQuery("#imagenes-slider .thumbnails").scrollLeft(positionX + scroll);
    }
    jQuery("#imagenes-slider .right").mousedown(function(){
        console.log("Sliding right");
        thumbnail_scroll = setInterval(function(){sliderScroll(10);},100);
    });
    jQuery("#imagenes-slider .left").mousedown(function(){
        console.log("Sliding left");
        thumbnail_scroll = setInterval(function(){sliderScroll(-10);},100);
    });
    jQuery("#imagenes-slider .right, #imagenes-slider .right").mouseup(function(){
        console.log("Stop slide right");
        clearInterval(thumbnail_scroll);
    });
     jQuery("#imagenes-slider .thumbnails span").click(function(){
       jQuery("#imagenes-slider").addClass("expanded") 
    });
    jQuery("#imagenes-slider .exit").click(function(){
       jQuery("#imagenes-slider").removeClass("expanded") 
    });
});
        </script>
        <div class="col-xs-12">
            <h4>Imagenes</h4>
            
        <div id="imagenes-slider">
            <div class="exit"><i class="material-icons">close</i></div>
            <div class="button left"><i class="material-icons">keyboard_arrow_left</i></div>
            <div class="button right"><i class="material-icons">keyboard_arrow_right</i></div>
                <div class="display"></div>
            <div class="thumbnails">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                </div>
            </div>
            </div>
        </div>
         <h4>Conversacion</h4>   
    <div id="comments" class="row">
            <div class="col-xs-12">
            <div id="comments-toggle">
            <span>COMENTAR</span>
            <i class="closed material-icons">keyboard_arrow_up</i>
            <i class="open material-icons">keyboard_arrow_down</i>
        </div>
            <div class="col-xs-12 disclaimer">
                <p>Usa una <a href="#">cuenta de Facebook</a> para agregar un comentario, sujeto a las <a href="#">politicas de privacidad</a> y <a href="#">Terminos de Uso de Facebook.</a> Tu nombre de Facebook, foto y otra informacion personal que hagas publica en Facebook, aparecera en tu comentario y puede ser usado en las plataformas de medios de Marcador.do. <a href="#">Mas informacion.</a>
            </p></div>
            </div>
            
            <div class="col-xs-12">
            <div class="comments-header row">
            <span class="col-xs-4 comments-number">0 Comentarios</span><span class="col-xs-8 comments-order">Ordenar por:<select><option>Los mas antiguos</option></select></span></div>
            </div>
        
            <div class="col-xs-12">
        <div class="comments-list" class="row">
            <div class="col-xs-2 clearfix" style="padding:0;"><div class="user-image"></div></div>
            <div class="col-xs-10 clearfix" style="padding-right:0;"><textarea>Anade un comentario...</textarea></div>
            </div>
                </div>
        </div>
        
    <div id="related" class="row">
            <div class="col-xs-12"><div class="title">Noticias Relacionadas</div></div>
            <div class="col-lg-6">
            <article>
            <header>En un rally de 6 anotaciones Yankees dejan en el camino a Texas.</header>
                </article>
            </div>
            <div class="col-lg-6">
            <article>
            <header>En un rally de 6 anotaciones Yankees dejan en el camino a Texas.</header>
                </article>
            </div>
        </div>
       
    </div>
    
    <div id="estadisticas_resumen" class="row tabs hidden">
        <!-- CINTILLO DE ESTADISTICAS
            INCLUDE BELOW -->
        <div id="cintillo_estadisticas">
        <div id="cintillo">
<div class="cintillo-row">
				<div class="cintillo-wrapper">
				<div class="cintillo-container">
				<div id="cintillo-selects-container">
				<div id="cintillo-selects">
<select id="league" class="form-control">
				<option value="mlb" selected="selected">MLB</option>
				<option value="lidom">LiDom</option>
</select>
<select id="league_day" class="form-control">			<option value="2016-10-25" selected="">25 Oct</option>
<option value="2016-10-24">24 Oct</option>
<option value="2016-10-23">23 Oct</option>
</select>
                    </div></div> 
<div id="cintillo-results-wrapper">
<div id="cintillo-results"></div>
</div>
<div class="cintillo-next-btn">
<a href="#next"><i class="material-icons md-24">chevron_right</i></a></div></div></div>
				</div>
			</div>
        </div>
        <!-- END OF CINTILLO ESTADISTICAS, INCLUDE ABOVE -->
        <div class="row header_score">
            <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-header">Minnesota vs. Athetics Agosto 01, 2016</div>
                <div class="panel-body">
            <div class="row">
            <div class="col-xs-3 col-sm-4 team"><div>Minnesota Twins<span class="team-score">(56-46)</span></div></div>
            <div class="logos col-xs-2 col-sm-1"><span class="logo mlb-min"></span></div>
            <div class="col-xs-2 col-sm-2 score"><span class="game-type">FINAL</span>15/10</div>
            <div class="logos col-xs-2 col-sm-1"><span class="logo mlb-oak"></span></div>
            <div class="col-xs-3 col-sm-4 team"><div>Oakland Athletics<span class="team-score">(58-46)</span></div></div>
            </div>
                </div>
            </div>
       </div>
        </div>
        <div class="table-scroll">
        <table class="stats">
                    <tr><th></th><th>1</th><th>2</th><th>3</th><th>4</th><th>5</th><th>6</th><th>7</th><th>8</th><th>9</th><th>10</th><th>R</th><th>H</th><th>E</th></tr>
                    <tr><td>Baltimore</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td></tr>
                    <tr><td>Minnesota</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td></tr>
                    </table>
        </div>
    <div id="stats" class="col-sm-12">
        
        <div class="col-sm-6">
        <div class="pitcher">
            <h4>Winner Pitcher</h4>
            <div class="detail">
                <span class="player-image col-xs-2"></span>
                <span class="player-name col-xs-3">Trevor Plouffe</span>
                <span class="player-stats col-xs-7">
                    <p>#59P Throws: R</p>
                    <p>2.1 IIP, 0 H, 5 SO, 0 ER, 4 BB</p>
                </span>
            </div>
            </div>
        </div>
        
        <div class="col-sm-6">
        <div class="pitcher">
            <h4>Winner Pitcher</h4>
            <div class="detail">
                <span class="player-image col-xs-2"></span>
                <span class="player-name col-xs-3">Trevor Plouffe</span>
                <span class="player-stats col-xs-7">
                    <p>#59P Throws: R</p>
                    <p>2.1 IIP, 0 H, 5 SO, 0 ER, 4 BB</p>
                </span>
            </div>
            </div>
        </div>
        
        <div class="col-sm-6">
        <div class="pitcher">
            <h4>Winner Pitcher</h4>
            <div class="detail">
                <span class="player-image col-xs-2"></span>
                <span class="player-name col-xs-3">Trevor Plouffe</span>
                <span class="player-stats col-xs-7">
                    <p>#59P Throws: R</p>
                    <p>2.1 IIP, 0 H, 5 SO, 0 ER, 4 BB</p>
                </span>
            </div>
            </div>
        </div>
        
        <div class="col-sm-6">
        <div class="pitcher">
            <h4>Winner Pitcher</h4>
            <div class="detail">
                <span class="player-image col-xs-2"></span>
                <span class="player-name col-xs-3">Trevor Plouffe</span>
                <span class="player-stats col-xs-7">
                    <p>#59P Throws: R</p>
                    <p>2.1 IIP, 0 H, 5 SO, 0 ER, 4 BB</p>
                </span>
            </div>
            </div>
        </div>
        
        <div class="col-sm-6">
        <div class="pitcher loser">
            <h4>Loser Pitcher</h4>
            <div class="detail">
                <span class="player-image col-xs-2"></span>
                <span class="player-name col-xs-3">Trevor Plouffe</span>
                <span class="player-stats col-xs-7">
                    <p>#59P Throws: R</p>
                    <p>2.1 IIP, 0 H, 5 SO, 0 ER, 4 BB</p>
                </span>
            </div>
            </div>
        </div>
        
        <div class="col-sm-6">
        <div class="pitcher loser">
            <h4>Loser Pitcher</h4>
            <div class="detail">
                <span class="player-image col-xs-2"></span>
                <span class="player-name col-xs-3">Trevor Plouffe</span>
                <span class="player-stats col-xs-7">
                    <p>#59P Throws: R</p>
                    <p>2.1 IIP, 0 H, 5 SO, 0 ER, 4 BB</p>
                </span>
            </div>
            </div>
        </div>
        
        </div>
    
    </div>
    
    <div id="puntuacion_resumen" class="row tabs hidden">
        
    <div id="cintillo_estadisticas">
        <div id="cintillo">
				<div class="cintillo-row">
					<div class="cintillo-wrapper">
						<div class="cintillo-container">
							<div id="cintillo-selects-container">
								<div id="cintillo-selects">
									<select id="league" class="form-control">
										<option value="mlb" selected="selected">MLB</option>
										<option value="lidom">LiDom</option>
									</select>
									<select id="league_day" class="form-control">
																					<option value="2016-10-25" selected="">
												25 Oct											</option>
																					<option value="2016-10-24">
												24 Oct											</option>
																					<option value="2016-10-23">
												23 Oct											</option>
																			</select>
									
								</div>
							</div> 
							<div id="cintillo-results-wrapper">
								<div id="cintillo-results"></div>
							</div>
							
							<div class="cintillo-next-btn">
								<a href="#next">
									<i class="material-icons md-24">chevron_right</i>
								</a>
							</div>
						</div>

					</div>
				</div>
			</div>
        </div>
        
    <div class="row header_score">
            <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-header">Minnesota vs. Athetics Agosto 01, 2016</div>
                <div class="panel-body">
            <div class="row">
            <div class="col-xs-3 col-sm-4 team"><div>Minnesota Twins<span class="team-score">(56-46)</span></div></div>
            <div class="logos col-xs-2 col-sm-1"><span class="logo mlb-min"></span></div>
            <div class="col-xs-2 col-sm-2 score"><span class="game-type">FINAL</span>15/10</div>
            <div class="logos col-xs-2 col-sm-1"><span class="logo mlb-oak"></span></div>
            <div class="col-xs-3 col-sm-4 team"><div>Oakland Athletics<span class="team-score">(58-46)</span></div></div>
            </div>
                </div>
            </div>
       </div>
        </div>
        
    <div id="glosary" class="col-xs-12">
    <div class="row">
            <!-- Col 1 -->
            <div class="col-xs-12 col-sm-2">
              <div class="glosary">
                Glosary
              </div>
            </div>
            
            <div class="col-xs-12 col-sm-10">
                <div class="row">
            <!-- Col 2 -->
            <div class="col-xs-4">
              <div class="status">
                <span class="status key">AB:</span> <span class="status value w">At Bats</span>
              </div>
              <div class="status">
                <span class="status key">R:</span> <span class="status value l">Runs</span>
              </div>
              <div class="status">
                <span class="status key">H:</span> <span class="status value pct">Hits</span>
              </div>
                <div class="status">
                <span class="status key">HR:</span> <span class="status value pct">Home Runs</span>
              </div>
            </div>
            <!-- Col 3 -->
            <div class="col-xs-4">
              <div class="status">
                <span class="status key">RBI:</span> <span class="status value home-visit">Run Batten In</span>
              </div>
              <div class="status">
                <span class="status key">BB:</span> <span class="status value el">Walks</span>
              </div>
              <div class="status">
                <span class="status key">SO:</span> <span class="status value pct">Total Strikeout</span>
              </div>
                <div class="status">
                <span class="status key">AVG:</span> <span class="status value pct">Batting Average</span>
              </div>
            </div>
            <!-- Col4 -->
            <div class="col-xs-4">
              <div class="status">
                <span class="status key">OBP:</span> <span class="status value gb">On Base Percentage</span>
              </div>
              <div class="status">
                <span class="status key">SLG:</span> <span class="status value l">Slugging Percentage</span>
              </div>
              <div class="status">
                <span class="status key">IP:</span> <span class="status value pct">Inning Pitching</span>
              </div>
                <div class="status">
                <span class="status key">ER:</span> <span class="status value pct">Earned Run Allowed</span>
              </div>
                <div class="status">
                <span class="status key">ERA:</span> <span class="status value pct">Earned Run Average</span>
              </div>
            </div>
                </div>
                </div>
          </div>
    </div>
        
    <div id="puntuaciones" class="col-xs-12">
        <div class="row">
        <div class="col-md-6">
            <table class="players">
            <tr><th>Hitting Player</th><th>AB</th><th>R</th><th>H</th><th>AHRB</th><th>RBI</th><th>BB</th><th>SO</th><th>AVG</th><th>OBP</th><th>SLG</th></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>Totals</td><td>45</td><td>7</td><td>4</td><td>4</td><td>0</td><td>1</td><td>1</td><td>.300</td><td>.818</td><td>.427</td></tr>
            </table>
            </div>
            
            <div class="col-md-6">
            <table class="players">
            <tr><th>Hitting Player</th><th>AB</th><th>R</th><th>H</th><th>AHRB</th><th>RBI</th><th>BB</th><th>SO</th><th>AVG</th><th>OBP</th><th>SLG</th></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>Totals</td><td>45</td><td>7</td><td>4</td><td>4</td><td>0</td><td>1</td><td>1</td><td>.300</td><td>.818</td><td>.427</td></tr>
            </table>
            </div>
            
            <div class="col-md-6">
            <table class="players">
            <tr><th>Hitting Player</th><th>AB</th><th>R</th><th>H</th><th>AHRB</th><th>RBI</th><th>BB</th><th>SO</th><th>AVG</th><th>OBP</th><th>SLG</th></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>Totals</td><td>45</td><td>7</td><td>4</td><td>4</td><td>0</td><td>1</td><td>1</td><td>.300</td><td>.818</td><td>.427</td></tr>
            </table>
            </div>
            
            <div class="col-md-6">
            <table class="players">
            <tr><th>Hitting Player</th><th>AB</th><th>R</th><th>H</th><th>AHRB</th><th>RBI</th><th>BB</th><th>SO</th><th>AVG</th><th>OBP</th><th>SLG</th></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>1 Bett RF</td><td>4</td><td>1</td><td>2</td><td>0</td><td>1</td><td>0</td><td>0</td><td>.306</td><td>.891</td><td>.463</td></tr>
                
                <tr><td>Totals</td><td>45</td><td>7</td><td>4</td><td>4</td><td>0</td><td>1</td><td>1</td><td>.300</td><td>.818</td><td>.427</td></tr>
            </table>
            </div>
            
        </div>
        </div>
    </div> 
          
        </div><!-- MAIN COLUMN -->
      <?php get_sidebar(); ?>
     
    </div>
  </div>
</div> 
<?php get_footer(); ?>