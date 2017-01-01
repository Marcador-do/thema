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
  <div id="main-content" class="vivo container-fluid">
    <div id="en-vivo" class="row">
      <div   class="col-lg-12">
           <!--MARCADOR EN VIVO -->
            <h1 class="page-title"><?php the_title(); ?></h1>
      </div>
        <div class="col-lg-8">
            <!-- div de alerta -->

          <!--   <div id="broadcasting" class="row">
              <span class="icon"><i class="material-icons">&#xE31D;</i></span><span class="tag">Estamos en vivo</span><span class="time">4:15</span><span class="cta">ENTRAR</span></div>-->
          
                <div class="video-container">
                  <iframe id="live" src="https://www.youtube.com/embed/1UdirOGTjOg" frameborder="0" allowfullscreen></iframe>
                </div>

                  <div class="banner col-sm-12 hidden-sm-down">ANUNCIO</div> 
           </div>
      

          <div id="sidebar-Streaming" class="col-lg-4">
              <iframe width="100%" height="550px" scrolling="no" style="border: none;" src="http://www.opinionstage.com/polls/2410620/poll" frameBorder="0" name="os_frame" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>  
          </div>       
                 
     </div>
              <!--FIN MARCADOR EN VIVO -->
   </div>
</div>
      
</div> 
<?php get_footer(); ?>