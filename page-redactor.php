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
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 div col-sm-12 col-md-12 col-lg-9">
         
           <!--PERFIL DEL REDACTOR -->
          <div id="redactor" class="row" >
            <h2 class="page-title"><?php the_title(); ?></h2>
<div class="row">
<div class="col-lg-3">
<div id="user-image"></div>
<div class="social">
<a></a>
<a></a>
<a></a>
</div>
 </div>
<div class="col-lg-9">
<div class="name">Cesar Marchena</div>
<p>
Ut efficitur bibendum porta. Donec iaculis lacus nec purus elementum, vitae mattis tortor eleifend. Donec lacinia dictum odio, at blandit mi tincidunt quis. Suspendisse potenti. Curabitur eget neque aliquam tortor pharetra consequat. Nam luctus ligula tellus, a porttitor diam viverra sit amet. Sed ligula nisi, maximus a ultrices sit amet, eleifend eget tortor. Proin lacinia nunc vitae rhoncus sodales. Ut sed purus at ligula commodo laoreet lacinia sed ante. Integer consequat bibendum turpis, at molestie orci lacinia vitae. Aliquam eget justo sed nisi vehicula porttitor. Aliquam tempus vehicula ante, tristique mollis justo commodo id. Vestibulum egestas gravida quam, id blandit dolor interdum in. Sed pretium pellentesque turpis vehicula volutpat. Suspendisse eget erat ut nisi laoreet aliquet. Etiam non porttitor felis, non dapibus nulla.
</p>
    <div class="especialidades">
        <div class="title">Especialidades</div>
    <span class="icon"></span><span class="icon"></span><span class="icon"></span>
    </div>
</div>
 </div>
<div class="row">

<div id="destacados" class="col-lg-12">
    <header>Articulos Destacados</header>
   
    <div class="col-lg-6">
        <article>
    <div class="image col-lg-4 col-xs-12"></div>
        <div class="col-lg-8">
            <div class="category">TENIS</div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae eleifend metus, ut elementum risus.</p>
            <p class="date">Jun 16, 2016</p>
        </div>
        </article>
    </div>  
    
     <div class="col-lg-6">
        <article>
    <div class="image col-lg-4 col-xs-12"></div>
        <div class="col-lg-8">
            <div class="category">TENIS</div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae eleifend metus, ut elementum risus.</p>
            <p class="date">Jun 16, 2016</p>
        </div>
        </article>
    </div>  
    
</div>
    </div>
            </div>
          <!--FIN PERFIL DEL REDACTOR -->
  
      </div>
        
     <!-- SIDEBAR -->
      <?php get_sidebar(); ?>
    
    </div>
  </div>
</div> 
<?php get_footer(); ?>