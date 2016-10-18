<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
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
							Ene 16, 2016
						</h2>
					</header>
				</div>
			</div>
		</div>
	</div> 
	<!-- /marcador-page-template -->

	<div class="page-template-post-listing">
		<!-- Marcador posts -->
		<div class="marcador-posts-listing-wrapper">
			<div class="container-fluid">
				<div class="row">
					<?php for ($i=0; $i <= 1; $i++): ?>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-lg-offset-1 marcador-post-list">
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-4 col-sm-5 col-md-4 col-lg-2 marcador-post-list-image-col">
										<a href="#post-permalink">
											<div class="marcador-post-list-image"></div>
										</a> 
									</div>
									<div class="col-xs-8 col-sm-7 col-md-8 col-lg-10">
										<div class="marcador-post-list-content">
											<div class="marcador-post-list-category">
												<a href="#category-permalink">
													Tenis
												</a> 
											</div>
											<div class="marcador-post-list-title">
												<a href="#post-title-permalink">
													Temporada perfecta de los Warriors arruinada: Lebron e Irving dan título a Cleveland
												</a>
											</div>
											<div class="marcador-post-list-meta">
												<div class="marcador-post-list-author">
													<a href="#author-link">
														César Marchena
													</a>
												</div>
												<div class="marcador-post-list-date">
													<a href="#date-link">
														Jun 16, 2016
													</a> 
												</div>
												<!-- Conditional -->
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
					<?php endfor; ?>
				</div>
			</div>
		</div>
		<!-- .marcador-posts-listing -->
	</div>
	

<?php
get_footer();
