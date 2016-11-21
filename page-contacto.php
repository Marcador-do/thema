<?php  
/**
 * [page-form.php]
 *
 * Page Form template.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @author  Ronnie Baez <ronnie.baez@gmail.com>
 * @package marcadordo
 */

  //response generation function
  $response = "";
  if ( isset( $_POST['submitted'] ) && '1' == $_POST['submitted'] ) {
    do_action('marcador_form');
  }
?>
<?php get_header(); ?>
<div id="marcador-page-template" class="search">
  <div id="main-content" class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <header class="page-header-template">
          <h2 class="page-title">
            <?php the_title(); ?>
          </h2>
        </header> 
      </div>
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="col-lg-12">
        <div class="page-content-template">
          <?php echo $response; ?>
          <?php /*the_content();*/ ?>
          <form action="<?php the_permalink(); ?>" method="post" name="contact-form">
            <?php ob_start(); the_ID();
              $ID = ob_get_clean(); ?>
            <?php wp_nonce_field( 'marcadordo-form' ); ?>
            <input type="hidden" name="submitted" value="1">
            <p><label class="form-label-marc">Nombre: </label>
            <input type="text" name="message_name" class="form-control input-lg" value="<?php echo esc_attr($_POST['message_name']); ?>" required /></p>
            <p><label class="form-label-marc">Email: </label>
            <input type="text" name="message_email" class="form-control input-lg" value="<?php echo esc_attr($_POST['message_email']); ?>" required /></p>
            <p><label class="form-label-marc">Teléfono: </label>
            <input type="text" name="message_phone" class="form-control input-lg" value="<?php echo esc_attr($_POST['message_phone']); ?>" required /></p>
            <p><label class="form-label-marc">Asunto</label><br>
              <input id="anunciarse" type="radio" name="message_asunto" value="anunciarse"> <label for="anunciarse">Anunciarse en nuestras plataformas</label><br>
              <input id="propuesta" type="radio" name="message_asunto" value="propuesta"> <label for="propuesta">Propuesta de negocios</label><br>
              <input id="sugerencia" type="radio" name="message_asunto" value="sugerencia"> <label for="sugerencia">Sugerencias</label></p>
            <p><label class="form-label-marc">Nombre de la Empresa (Opcional): </label>
            <input type="text" name="message_enterprise" class="form-control input-lg" value="<?php echo esc_attr($_POST['message_enterprise']); ?>" /></p>
            <p><label class="form-label-marc">Mensaje: </label>
            <textarea name="message_text" class="form-control input-lg" required><?php echo esc_attr($_POST['message_text']); ?></textarea></p>
            <div class="g-recaptcha" data-sitekey="6LdRKScTAAAAAJPyo5vFu88ynXXJ52hIisA4IQlv"></div>
            <p><input type="submit" class="btn btn-primary btn-lg" value="Enviar" /></p>
          </form>
        </div>
      </div>
      <?php endwhile; endif; ?>
        <?php get_sidebar(); ?>
    </div>
  </div>
</div> 
<?php get_footer(); ?>