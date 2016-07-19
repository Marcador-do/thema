<?php  
/**
 * [index.php]
 *
 * The main template.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @author  Richard Blonder <richardblondet@gmail.com>
 * @package marcadordo
 */

get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</header>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
		<footer>
			<?php $tag = get_the_tags(); if (!$tag) { } else { ?><p><?php the_tags(); ?></p><?php } ?>
		</footer>
		<hr />
	</article>
<?php endwhile; ?>

<?php get_footer(); ?>
