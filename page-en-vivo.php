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
<div id="marcador-page-template" class="search">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 div col-sm-12 col-md-12 col-lg-9">
         <!--MARCADOR EN VIVO -->
          <div id="en-vivo" class="row">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <div class="stream">
    <iframe id="live" src="https://www.youtube.com/embed/1UdirOGTjOg" frameborder="0" allowfullscreen></iframe>
            
        <div class="banner hidden-xs-down col-sm-12">ANUNCIO</div>
            
        <div class="encuesta col-sm-12">
            <header>
                <span>ENCUESTA</span>
               
                <span class="cta"><i class="material-icons">fast_forward</i>Ver Respuestas</span>
                 <span class="participantes">41 Participantes</span>
            </header>
            <div class="pregunta">Quien sera el mejor equipo que clasificara al  Clasico 2017?</div>
            
            <p><input type="radio" id="brasil" value="1" name="pais"><label class="material-icon" for="brasil">Brasil</label><span class="barra"><b><i></i></b></span><span class="valor">3</span>
            </p>
            
            <p><input type="radio" id="colombia" value="2" name="pais"><label for="colombia">Colombia</label><span class="barra"><b><i></i></b></span><span class="valor">25</span>
            </p>
            <p><input type="radio" id="mexico" value="3" name="pais"><label for="mexico">Mexico</label><span class="barra"><b><i></i></b></span><span class="valor">5</span>
            </p>
            
            
            </div>
        
    </div>
        </div>
          <!--FIN MARCADOR EN VIVO -->
      </div>
        
     <!-- SIDEBAR -->
      <?php get_sidebar(); ?>
    
    </div>
  </div>
</div> 
<?php get_footer(); ?>