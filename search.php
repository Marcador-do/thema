<?php  
/**
 * [search.php]
 *
 * The search results template. Used when a search is performed.
 *
 * @link https://codex.wordpress.org/Category_Templates
 * @author  Richard Blonder <richardblondet@gmail.com>
 * @package marcadordo
 */
?>
<?php get_header(); ?>
	
	<!-- marcador-page-template -->
	<div id="marcador-page-template" class="search">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 div col-sm-12 col-md-12 col-lg-12">
					<header class="page-header-template">
						<h2 class="page-title">
							<?php echo get_search_query(); ?>
						</h2>
					</header>
				</div>
			</div>
		</div>
	</div> 
	<!-- /marcador-page-template -->

	<div class="page-template-post-listing">
		<!-- Marcador posts -->
		<?php if( have_posts() ):  ?>
		<div class="marcador-posts-listing-wrapper">
			<div class="container-fluid">
				<div class="row">
					<?php while( have_posts() ): the_post(); ?>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 marcador-post-list">
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-4 col-sm-4 col-md-4 col-lg-2 marcador-post-list-image-col">
										<a href="<?php echo esc_url( get_permalink() ); ?>">
											<?php if( has_post_thumbnail( get_the_id()) ): ?>
												<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ), 'full' ); ?>

											<?php endif; ?>
											<div class="marcador-post-list-image" style="background-image: url('<?php echo $image[0]; ?>') "></div>
										</a> 
									</div>
									<div class="col-xs-8 col-sm-8 col-md-8 col-lg-10">
										<div class="marcador-post-list-content">
											<?php 
				 								$categories = get_the_category();
												$category = $categories[0]->name; 
												$category_id = $categories[0]->term_id; // var_dump($categories[0]); 
												$cat_count = count( $categories ) - 1;
												$c = 0;
											?>
											<?php if( $cat_count > 1 ): ?>
											<div class="marcador-post-list-category">
												<?php foreach ($categories as $cat => $cat_value):  ?>
													<?php if( $cat_value->slug != 'acento' ): ?>
													<a href="<?php echo esc_url( get_category_link( $cat_value->term_id ) ); ?>">
														<?php echo $cat_value->name; ?>
													</a><?php if( ++$c !== $cat_count ): ?>,<?php endif; ?>
													<?php endif; ?>
												<?php endforeach; ?>
											</div>
											<?php endif; ?>
											<div class="marcador-post-list-title">
												<a href="<?php echo esc_url( get_permalink() ); ?>">
													<?php the_title(); ?>
												</a>
											</div>
											<div class="marcador-post-list-excerpt">
												<?php the_excerpt(); ?>
											</div>
											<div class="marcador-post-list-meta">
												<div class="marcador-post-list-author">
													<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
														<?php echo get_the_author_meta( 'user_nicename' ); ?>
													</a>
												</div>
												<div class="marcador-post-list-date">
													<a href="<?php echo esc_url( get_day_link( $year = get_the_date('Y') , $month = get_the_date('m'), $day = get_the_date('d') ) ) ?>">
														<?php the_date('M d, Y', '', ''); ?>
													</a> 
												</div>
												<!-- Conditional if favorite -->
												<div class="marcador-post-list-fav">
													<i class="material-icons">star</i>
												</div>
												<!-- end conditional -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> 
					<?php endwhile; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<!-- .marcador-posts-listing -->
	</div>
	

<?php
get_footer();
