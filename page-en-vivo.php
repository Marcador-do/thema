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
<div id="marcador-page-template">
  <div id="main-content" class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
         <!--MARCADOR EN VIVO -->
          <h1 class="page-title"><?php the_title(); ?></h1>
          
           <div id="broadcasting" >
            <span class="icon"><i class="material-icons">&#xE31D;</i></span><span class="tag">Estamos en vivo</span><span class="time">4:15</span><span class="cta">ENTRAR</span></div>
          
          <div id="en-vivo" class="row">
        
           
        <div class="stream col-lg-12">
    <iframe id="live" src="https://www.youtube.com/embed/1UdirOGTjOg" frameborder="0" allowfullscreen></iframe>
            
        <div class="banner hidden-sm-down">ANUNCIO</div>
            
        <div class="encuesta">
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