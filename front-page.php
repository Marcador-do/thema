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


<?php while ( $destacadas->have_posts() ): $destacadas->the_post(); ?>
	
	<?php $destacadas_ids[] = get_the_ID(); ?>

	<?php if ( $destacadas->current_post === 0 ): ?>
		<?php if ( get_post_type() === "marcador_partido" ): ?>
			<?php include (get_template_directory() . "/includes/marcador_hero_post_score.include.php"); ?>
		<?php else: ?>
			<?php include (get_template_directory() . "/includes/marcador_hero_post.include.php"); ?>
		<?php endif; ?>

		<?php include_once (get_template_directory() . "/includes/marcador_cintillo_estadisticas.include.php"); ?>

			<div class="container-fluid">
				<div class="row">

					<div class="col-xs-12 col-sm-12 col-lg-9">
						<!-- Marcador posts -->
						<div class="marcador-posts-listing-wrapper cards">
							<div class="container-fluid">
								<div class="row">

									<?php continue; endif; ?>
										<?php include (get_template_directory() . "/includes/marcador_hero_post_list_item.include.php"); ?>
									<?php endwhile; ?>
								</div>
							</div>
						</div>
						<!-- .marcador-posts-listing -->
					</div>
					
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
							"img"	 => "CHW-logo-sm.png"
						)
					);
					?>
					<!-- .marcador-agrega-favoritos -->
					<div class="col-xs-12 col-sm-12 col-lg-9">
						<div class="marcador-favoritos-equipos-container">
							div.marcador-box
						</div>
					</div>
					<!-- /.marcador-agrega-favoritos -->

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
		<div class="col-xs-12 col-sm-12 col-lg-9">
			<header class="page-header-template">
				<h2 class="page-title"><?php echo $cat_first_section->name; ?></h2>
			</header>
			<br>
		</div>

			<?php while ( $first_section->have_posts() ): $first_section->the_post(); ?>
				<?php if ( $first_section->current_post === 0 ):  ?>
					<?php include (get_template_directory() . "/includes/marcador_hero_post.include.php"); ?>

		<div class="col-xs-12 col-sm-12 col-lg-9">
			<!-- Marcador posts -->
			<div class="marcador-posts-listing-wrapper cards-wrapper">
				<div class="container-fluid">
					<div class="row">
				<?php continue; endif; ?>

					<?php include ( get_template_directory() . "/includes/marcador_hero_post_list_item_card.include.php" ); ?>

			<?php endwhile; ?>
					</div>
				</div>
			</div>
		<!-- .marcador-posts-listing -->
		</div>
		<?php endif; ?>


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
				<div class="col-xs-12 col-sm-12 col-lg-9">
					<header class="page-header-template">
						<h2 class="page-title"><?php echo $cat_second_section->name; ?></h2>
					</header>
					<br>
				</div>

				<?php while ( $second_section->have_posts() ): $second_section->the_post(); ?>
					<?php if ( $second_section->current_post === 0 ):  ?>
						<?php include (get_template_directory() . "/includes/marcador_hero_post.include.php"); ?>

				<div class="col-xs-12 col-sm-12 col-lg-9">
					<!-- Marcador posts -->
					<div class="marcador-posts-listing-wrapper">
						<div class="container-fluid">
							<div class="row">
					<?php continue; endif; ?>

						<?php include (get_template_directory() . "/includes/marcador_hero_post_list_item_one_col.include.php"); ?>


				<?php endwhile; ?>
							</div>
						</div>
					</div>
				<!-- .marcador-posts-listing -->
				</div>

		<?php endif; ?>


	</div>
</div>

<?php /*<div id="marcador-page-template" class="search">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 div col-sm-12 col-md-12 col-lg-12">
				<header class="page-header-template">
					<h2 class="page-title">
						Baloncesto
					</h2>
				</header>
			</div>
		</div>
	</div>
</div> */ ?>

<?php get_footer(); ?>