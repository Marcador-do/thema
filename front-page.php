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
?>
<?php get_header(); ?>
<?php /* <!-- #marcador-navbar-submenu --> */ ?>
<div id="marcador-navbar-submenu">
	<ul class="nav nav-pills">
		<li class="active">
			<a href="#noticias">Noticias</a>
		</li>
		<li>
			<a href="#virales">Virales</a>
		</li>
	</ul>
</div>
<?php /* <!-- /#marcador-navbar-submenu --> */ ?>

<?php
	$args = array(
		'category_name'    => 'destacado,destacadas',
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
?>

<?php while ( $destacadas->have_posts() ): $destacadas->the_post(); ?>
	<?php if ( $destacadas->current_post === 0 ):  ?>
		
		<?php if ( $destacadas->get_post_type() === "partido" ): ?>
			<?php include (get_template_directory() . "/includes/marcador_hero_post_score.include.php"); ?>
		<?php else: ?>
			<?php include (get_template_directory() . "/includes/marcador_hero_post.include.php"); ?>
		<?php endif; ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-lg-9">
			<!-- Marcador posts -->
			<div class="marcador-posts-listing-wrapper">
				<div class="container-fluid">
					<div class="row">

	<?php continue; endif; ?>

			<?php $col = 2; include (get_template_directory() . "/includes/marcador_hero_post_list_item.include.php"); ?>

<?php endwhile; ?>
					</div>
				</div>
			</div>
			<!-- .marcador-posts-listing -->
		</div>
	</div>
</div>




<?php
	$args = array(
		'category_name'    => 'baloncesto', // TODO: get as option
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
	$first_section = new WP_Query( $args );
	$cat = get_category_by_slug( 'baloncesto' );
?>
<?php if ( $first_section->have_posts() ): ?>

<div id="marcador-page-template" class="search">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-lg-9">
				<header class="page-header-template">
					<h2 class="page-title">
						<?php echo $cat->name; ?>
					</h2>
				</header>
			</div>
		</div> 
	</div>
</div>

		<?php while ( $first_section->have_posts() ): $first_section->the_post(); ?>
			<?php if ( $first_section->current_post === 0 ):  ?>
				<?php include (get_template_directory() . "/includes/marcador_hero_post.include.php"); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-lg-9">
			<!-- Marcador posts -->
			<div class="marcador-posts-listing-wrapper">
				<div class="container-fluid">
					<div class="row">
			<?php continue; endif; ?>

				<?php $col = 1;  include (get_template_directory() . "/includes/marcador_hero_post_list_item.include.php"); ?>


		<?php endwhile; ?>
					</div>
				</div>
			</div>
		<!-- .marcador-posts-listing -->
		</div>
	</div>
</div>
<?php endif; ?>

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