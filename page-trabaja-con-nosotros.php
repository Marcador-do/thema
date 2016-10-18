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
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 div col-sm-12 col-md-12 col-lg-9">
        <header class="page-header-template">
          <h2 class="page-title">
            <?php the_title(); ?>
          </h2>
        </header> 
      </div>
      <?php if (have_posts()) : while (have_posts()) : the_post();?>
      <div class="col-xs-12 div col-sm-12 col-md-12 col-lg-9">
        <div class="page-content-template">
          <?php echo $response; ?>
          <?php /*the_content();*/ ?>
          <form action="<?php the_permalink(); ?>" method="post" name="work-with-us-form">
            <?php ob_start(); the_ID();
              $ID = ob_get_clean(); ?>
            <?php wp_nonce_field( 'marcadordo-form' ); ?>
            <input type="hidden" name="submitted" value="1">

            <p><label class="form-label-marc">Nombre completo: </label>
            <input type="text" name="message_name" class="form-control input-lg" value="<?php echo esc_attr($_POST['message_name']); ?>" required /></p>
            
            <p><label class="form-label-marc">Email: </label>
            <input type="text" name="message_email" class="form-control input-lg" value="<?php echo esc_attr($_POST['message_email']); ?>" required /></p>

            <p><label class="form-label-marc">Teléfono: </label>
            <input type="text" name="message_phone" class="form-control input-lg" value="<?php echo esc_attr($_POST['message_phone']); ?>" required /></p>

            <p><label class="form-label-marc">Mensaje: </label>
            <textarea name="message_text" class="form-control input-lg" required><?php echo esc_attr($_POST['message_text']); ?></textarea></p>
            
            <div class="g-recaptcha" data-sitekey="6LdRKScTAAAAAJPyo5vFu88ynXXJ52hIisA4IQlv"></div>
            <p><input type="submit" class="btn btn-primary btn-lg" value="Enviar" /></p>
          </form>
        </div>
      </div>
      <?php endwhile; endif; ?>
    </div>
  </div>
</div> 
<?php get_footer(); ?>