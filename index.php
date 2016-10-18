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
?>
<?php get_header(); ?>
<?php if( have_posts() ): ?>
	you are in <code>index.php</code>
	<?php while( have_posts() ): the_post(); ?>
	<?php echo get_post_format(); ?>
		<?php the_title(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>