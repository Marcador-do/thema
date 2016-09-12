<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package marcadordo
 * @author Richard Blondet <richardblondet@gmail.com>
 */
?>
<?php get_header(); ?>
      
        <div class="container">
          <div class="grupo1">
            <img class="sim bounceInLeft" src="<?php echo get_template_directory_uri(); ?>/assets/imgs/404/emr_simbolo.png" />
            <div class="titulo bounceInDown">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/404/emr_titulo.png" />
            </div>
            <p class="texto fadeIn">Lo sentimos, pero esta pagina no se encuentra en nuestro directorio, favor verificar el enlace.</p>
          </div>

          <div class="container-redes slideInUp">
            <ul>
              <li><img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/404/emr_texto.png" /></li>
              <li><a href="https://www.facebook.com/Marcador.do/"><img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/404/emr_facebook.png" /></a>
              <li><a href="https://twitter.com/marcador_do"><img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/404/emr_twitter.png" /></a>
              <li><a href="https://www.instagram.com/marcador.do/"><img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/404/emr_instagram.png" /></a>
            </ul>
        </div>
      </div>

<?php get_footer(); ?>
