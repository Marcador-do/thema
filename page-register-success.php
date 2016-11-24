<?php
/**
 * The template for displaying Form Success (not found).
 * Template Name: Form Success
 *
 * @package marcadordo
 * @author Richard Blondet <richardblondet@gmail.com>
 * @author Raylin Aquino <raylinaquino@gmail.com>
 * 
 */
$ref = htmlentities($_GET["ref"]);

if(!isset($_GET["ref"]) ){
	wp_redirect(get_site_url());
	exit;
}
?>
<?php get_header(); ?>
      
        <div class="container">
			
          <div class="form-success">   
          	<?php if($ref == "register-form"): ?>         
            <h1><?php _e("¡Muchas Gracias por registrarte!"); ?></h1>
            <p class="texto fadeIn"><?php _e("Te hemos enviado un correo, con las instrucciones de acceso. Por favor, valida tu dirección para poder entrar al portal.");?></p>
            <p><a href="<?php echo get_site_url(); ?>" class="btn btn-go-back marcador-special"><?php _e("Volver al Inicio"); ?></a></p>
        <?php endif; ?>
          </div>

         
      </div>

<?php get_footer(); ?>
