<?php  
/**
 * Template Name: Forgot Password
 *
 * Page Form template.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @author  Ronnie Baez <ronnie.baez@gmail.com>
 * @package marcadordo
 */

  //response generation function
$data = htmlentities($_POST['passw']);


?>
<?php get_header(); ?>
<div id="marcador-page-template" class="forgot-tpl">
  <div id="main-content" class="container-fluid">
    <div class="row">

      <div class="col-md-3 col-md-offset-3">
        <div class="page-content-template">
          <?php 
          if (empty($data) ) {
           ?>
          <h1>
            <?php _e("Cambiar Contraseña"); ?>
          </h1>
          <form action="<?php the_permalink(); ?>" method="post" name="forgot-form-change">
            <?php ob_start(); the_ID();
            $ID = ob_get_clean(); ?>
            <?php wp_nonce_field( 'marcadordo-form' ); ?>

            <div class="form-group">
              <i class="fa fa-eye showHidePass trans-3" data-passID = 'passw' aria-hidden="true"></i>       

              <input type="password" name="passw" id="passw" class="form-control input-lg" placeholder="<?php _e("Nueva Contraseña"); ?>" value="<?php echo esc_attr($_POST['message_name']); ?>"  />
            </div>

            <div class="form-group">
              <i class="fa fa-eye showHidePass trans-3" data-passID = 'repit-passw' aria-hidden="true"></i>       

              <input type="password" name="repit-passw" id="repit-passw" placeholder="<?php _e("Repetir Nueva Contraseña"); ?>" class="form-control input-lg" value="<?php echo esc_attr($_POST['message_email']); ?>"  />

            </div>
            
            <p><input type="submit" class="btn btn-primary btn-lg" value="Enviar" /></p>
          </form>
          
          <?php } else { ?>
           <h1>
            <?php _e("Contraseña actualizada!"); ?>
          </h1>
          <p><?php  echo sprintf(__("Enhorabuena, has actualizado tu contraseña. A continuación puedes %s"), '<a href="#">Iniciar Sesión</a>'); ?></p>
          <?php } ?>

        </div>
      </div>

    </div>
  </div>

</div> 
<?php get_footer(); ?>