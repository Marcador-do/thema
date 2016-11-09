<?php  
/**
 * [front-page.php]
 *
 * The home page template.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @author  Richard Blonder <richardblondet@gmail.com>
 * @package marcadordo
 */
 
get_header();

/**
 * Asking if the primary_top menu exists
 */
if ( has_nav_menu( 'primary_top' ) ) {
	/**
	 * WP_NAV_MENU Args
	 * @var array
	 */
	$args = array(
		'theme_location' => 'primary_top',
		'container_id' => 'marcador-navbar-submenu',
		'menu_class' => 'nav nav-pills',
		'depth' => 1,
	);
	wp_nav_menu( $args );
}
/* /#marcador-navbar-submenu */

/**
 * Front page: Destacados
*/
$cat_dest = get_category_by_slug( 'destacado' );
$cat_dests = get_category_by_slug( 'destacadas' );
$display_type = 2;  // TODO: Get from options
$args = array(
//	'category_name'    => 'destacado,destacadas',
	'category__in' => array( $cat_dest->cat_ID, $cat_dests->cat_ID ), // TODO: Get from options
	'post_type' => 'any',
	
	'post_status' => array(
		'publish',
	),
	'order'               => 'DESC',
	'orderby'             => 'date',
	'ignore_sticky_posts' => false,
	'posts_per_page'         => 5,
	'perm' => 'readable',
);

$destacadas = new WP_Query( $args );
$destacadas_ids = array(); ?>

<?php  
$marcador_equipos = array(
						array(
							"nombre" => "Baltimore Orioles",
							"img"	 => "BAL-logo-sm.png",
						),
						array(
							"nombre" => "Boston Red Sox",
							"img"	 => "BOS-logo-sm.png",
						),
						array(
							"nombre" => "Chicago White Sox",
							"img"	 => "CWS-logo-sm.png"
						)
					);
					?>



<div class="container-fluid">
    <div class="row">
        <!-- MAIN COLUMN -->
        <div class="col-lg-9 col-md-9 col-xs-12">
              <?php while ( $destacadas->have_posts() ): $destacadas->the_post(); ?>
	
	<?php $destacadas_ids[] = get_the_ID(); ?>          
	<?php if ( $destacadas->current_post === 0 ): ?>
            <?php if ( get_post_type() === "marcador_partido" ): ?>
			<?php include (get_template_directory() . "/includes/marcador_hero_post_score.include.php"); ?>
		<?php else: ?>
			<?php include (get_template_directory() . "/includes/marcador_hero_post.include.php"); ?>
		<?php endif; ?>

		<?php include_once (get_template_directory() . "/includes/marcador_cintillo_estadisticas.include.php"); ?>
                        
						<!-- Marcador posts -->
<div class="row marcador-posts-listing-wrapper cards">
									<?php continue; endif; ?>
										<?php include (get_template_directory() . "/includes/marcador_hero_post_list_item.include.php"); ?>
									<?php endwhile; ?>
</div>
						<!-- .Marcador-posts-listing -->
                        
                        
					<!-- Marcador-Agrega-Favoritos -->
            <div class="row">
<div class="col-xs-12">
    <div class="marcador-favoritos-equipos-container">
							<div class="marcador-favoritos-equipos-wrapper">
								<div class="marcador-box static">
									<div class="panel panel-default">
										<div class="panel-body">
											<p class="text-center">
												Para ver tus favoritos <br>debes entrar a Marcador o registrarse
											</p>
											<p>
												<a href="#" class="btn btn-default btn-block marcador-special close-login" data-toggle="modal" data-target="#registerModal">
													<?php echo __( 'Entrar', 'marcadordo' ); ?>
												</a>
											</p>
											<p>
												<a class="btn btn-danger btn-block google">
													<?php echo __( 'Registrarse', 'marcadordo' ) ?>
												</a>
											</p>
										</div>
									</div>
								</div>
                                
								<?php $dinamic_width = 220; ?>
								<?php foreach( $marcador_equipos as $marcador_boxes ): ?>
									<?php $dinamic_width = $dinamic_width + 220; ?>
									<div class="marcador-box dinamic">
										<div class="panel panel-default">
											<div class="panel-body">
												<button class="close">&times;</button>
												<p class="text-center">
													<img src="<?php echo get_template_directory_uri() . '/assets/imgs/mlb/' . $marcador_boxes['img']; ?>" alt="">
												</p>
												<p class="text-center">
													<?php echo $marcador_boxes['nombre']; ?>
												</p>
												<p>
													<a href="#" class="btn btn-default btn-block favorites">
														<i class="material-icons">add</i> Favoritos
													</a>
												</p>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
								<script type="text/javascript">
								jQuery(document).ready( adjustWidthTemporalFix );
								
								/**
								 * Make the width of the wrapper dinamic for each element
								 */
								function adjustWidthTemporalFix() {
									jQuery('.marcador-favoritos-equipos-wrapper').css('width', '<?php echo $dinamic_width; ?>px');
								}
								</script>
							</div>
						</div>
            </div>
                </div>
					<!-- / Marcador-agrega-favoritos -->
                        
<div class="row">
    <?php
			/**
			 * Front page: First Section
		   */
			$cat_first_section = get_category_by_slug( 'baloncesto' );
			$display_type = 1;  // TODO: Get from options
			$args = array(
			//	'category_name'    => '', // TODO: get as option
				'category__in'     => array( $cat_first_section->cat_ID ),
				'post__not_in' => $destacadas_ids,
				'post_type' => 'any',
				'post_status' => array(
					'publish',
					),
				'order'               => 'DESC',
				'orderby'             => 'date',
				'ignore_sticky_posts' => false,
				'posts_per_page'         => 3,
				'perm' => 'readable',
			);
			$first_section = new WP_Query( $args );
		?>
		<?php if ( $first_section->have_posts() ): ?>
    
		<!-- PRINT FIRST SECTION -->
    <div class="col-xs-12">
			
				<h2 class="page-title"><?php echo $cat_first_section->name; ?></h2>

			<?php while ( $first_section->have_posts() ): $first_section->the_post(); ?>
				<?php if ( $first_section->current_post === 0 ):  ?>
					<?php include (get_template_directory() . "/includes/marcador_hero_post.include.php"); ?>
            </div>
            
<div class="col-xs-12">
		
			<!-- Marcador posts -->
			<div class="marcador-posts-listing-wrapper cards-wrapper">
					<div class="row">
				<?php continue; endif; ?>
					<?php include ( get_template_directory() . "/includes/marcador_hero_post_list_item_card.include.php" ); ?>

			<?php endwhile; ?>
					</div>
			</div>
		<!-- .marcador-posts-listing -->
		
</div>
		<?php endif; ?>
            </div>

<div class="row">
		<?php
			/**
			 * Front page: Second Section
		   */
			$cat_second_section = get_category_by_slug( 'beisbol' );
			$display_type = 1;  // TODO: Get from options
			$args = array(
			//	'category_name'    => '', // TODO: get as option
				'category__in'     	=> array( $cat_second_section->cat_ID ),
				'post__not_in' 			=> $destacadas_ids,
				'post_type' 				=> 'any',
				'post_status' 			=> array(
					'publish',
					),
				'order'               => 'DESC',
				'orderby'             => 'date',
				'ignore_sticky_posts' => false,
				'posts_per_page'         => 3,
				'perm' => 'readable',
			);
			$second_section = new WP_Query( $args );
		?>
		  <?php if ( $second_section->have_posts() ): ?>
				<div class="col-xs-12">
						<h2 class="page-title"><?php echo $cat_second_section->name; ?></h2>
				</div>
                <div class="col-xs-12">
				<?php while ( $second_section->have_posts() ): $second_section->the_post(); ?>
					<?php if ( $second_section->current_post === 0 ):  ?>
						<?php include (get_template_directory() . "/includes/marcador_hero_post.include.php"); ?>
                    </div>
    
				<div class="col-xs-12">
					<!-- Marcador posts -->
					<div class="marcador-posts-listing-wrapper">
							<div class="row">
					<?php continue; endif; ?>

						<?php include (get_template_directory() . "/includes/marcador_hero_post_list_item_one_col.include.php"); ?>

				<?php endwhile; ?>
							</div>
						
					</div>
				<!-- .marcador-posts-listing -->
				</div>

		<?php endif; ?>
    </div>
    </div><!-- END OF MAIN COLUMN -->
        <!-- SIDEBAR -->
        <?php get_sidebar('front-page'); ?>
    </div><!-- / ROW -->
	</div><!-- / CONTAINER FLUID -->

<?php get_footer(); ?>
