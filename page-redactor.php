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
         
           <!--PERFIL DEL REDACTOR -->
          <div id="redactor" class="row" >
            <h2 class="page-title"><?php the_title(); ?></h2>
<div class="row">
<div class="profile col-xs-12 col-sm-4 col-md-3">
<div class="user-image"></div>
<div class="social">
<a></a>
<a></a>
<a></a>
</div>
 </div>
<div class="info col-xs-12 col-sm-8 col-md-9">
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
   <div class="row">
       
    <div class="col-sm-6">
        <article class="clearfix">
            <div class="row">
    <div class="col-xs-4"><div class="image"></div></div>
    <div class="col-xs-8">
            <div class="category">TENIS</div>
            <div class="title">Lorem ipsum dolor sit amet, consectetur. Ut vitae eleifend metus, ut elementum risus.</div>
            <div class="date">Jun 16, 2016</div>
        </div>
            </div>
        </article>
    </div>  
    
     <div class="col-sm-6">
        <article class="clearfix">
            <div class="row">
    <div class="col-xs-4"><div class="image"></div></div>
    <div class="col-xs-8">
            <div class="category">TENIS</div>
            <div class="title">Lorem ipsum dolor sit amet, consectetur. Ut vitae eleifend metus, ut elementum risus.</div>
            <div class="date">Jun 16, 2016</div>
        </div>
            </div>
        </article>
    </div>  
    
    
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