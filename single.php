<?php  
/**
 * [single.php]
 *
 * The Single template file, for single posts
 *
 * @author  Richard Blonder <richardblondet@gmail.com>
 * @package marcadordo
 */
?>

<?php get_header(); ?>
<div id="single-post-template-file">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
				<div class="row">
					<?php if( have_posts() ): ?>
					<div class="container-fluid">
						<div class="row">
							<?php while( have_posts() ): the_post(); ?>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<?php if( has_post_thumbnail( $post_id ) ): ?>
									<?php 
									/** @var string the featured image attached to this post */
									$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ), 'full'); 

									/** @var string the image title */
									$image_title = get_post( get_post_thumbnail_id() )->post_title;

									/** @var string the image caption */
									$image_caption = get_post( get_post_thumbnail_id() )->post_excerpt;

									/** @var string the image description */
									$image_description = get_post( get_post_thumbnail_id() )->post_content; 
									?>
									
									<div class="single-post-featured-image" style="background-image: url('<?php echo $image[0]; ?>')"></div>
									<div class="single-post-featured-image-description">
										<?php print_r( $image_title ); ?>
									</div>
									<div class="single-post-title-content">
										<?php the_title( '<h1 class="single-post-title">', '</h1>', $echo = true ); ?>
									</div>
									<div class="single-post-meta-content">
										<div class="single-post-list-author">
											<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
												<?php echo get_the_author_meta( 'user_nicename' ); ?>
											</a>
										</div>
										<div class="single-post-list-date">
											<a href="<?php echo esc_url( get_day_link( $year = get_the_date('Y') , $month = get_the_date('m'), $day = get_the_date('d') ) ) ?>">
												<?php the_date('M d, Y', '', ''); ?>
											</a> 
										</div>
									</div>
									<div class="single-post-content">
										<?php the_content(); ?>
									</div>
								<?php endif; ?>
							</div>
							<?php endwhile; ?>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>