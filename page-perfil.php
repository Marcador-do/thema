<?php  
/**
 * [page-perfil.php]
 *
 * Page profile user template.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @author  Richard Blondet <mail@richardblondet.com>
 * @package marcadordo
 */
do_action('is_marcador_user_session');

$dimension = '300x225';
get_header();
do_action('add_menu_marcador_user_section');

$user 		= wp_get_current_user();
$user_meta 	= get_user_meta ( $user->ID );
$paged      = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

/** Getting Own Posts **/
$args = array(
	'author'        =>  $user->ID,
	'orderby'       =>  'post_date',
	'order'         =>  'DESC',
	'posts_per_page' => 4,
	 'paged' => $paged,
	'post_status' => array('publish', 'pending', 'draft', 'future', 'private', 'inherit') 
	);

$query_own_posts = new WP_Query($args);


?>
<style>
	.well { background-color: #cdcdcd; padding: 15px; }
</style>
<div id="profile-page" class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
			<div class="user-profile">
				<!-- Please crop this image to be $dimension = 300x225  -->
				<div class="user-profile-picture">
					<img src="<?php  echo get_wp_user_avatar_src($user->ID , array("size"=>"300")); ?>" width="100%" alt="USER PROFILE" class="img-responsive">
				</div>
				<p>
					<a href="<?php echo get_admin_url().'/profile.php'; ?>" class="btn btn-default marcador-special edit-profile" target="_blank" data-action="edit">Editar</a>
				</p>
				<div class="user-profile-info">
					<?php if(!empty($user->first_name)){ ?>
					<div class="user-field-group">
						<div class="user-field value">
							<span class="name"><?php echo esc_html($user->first_name); ?></span>&nbsp;
							<span class="lastname"><?php echo esc_html($user->last_name); ?></span>
						</div>
						<div class="user-field form-inline hide">
							<div class="form-group">
								<input type="text" placeholder="Nombre"
								value="<?php echo esc_attr($user->first_name); ?>"
								class="form-control">
							</div>
							<div class="form-group">
								<input type="text" placeholder="Apellido"
								value="<?php echo esc_attr($user->last_name); ?>"
								class="form-control">
							</div>
						</div>
						<div class="user-field-name">
							<?php _e('Nombre Completo') ?>
						</div>
					</div>
					<?php } ?>
					<?php if(!empty($user->user_email)){ ?>	
					<div class="user-field-group">
						<div class="user-field value">
							<?php echo __($user->user_email, 'marcadordo'); ?>
						</div>
						<div class="user-field form-inline hide">
							<div class="form-group">
								<input type="email" placeholder="Email"
								value="<?php echo __($user->user_email, 'marcadordo'); ?>"
								class="form-control">
							</div>
						</div>
						<div class="user-field-name">
							<?php _e('Email') ?>
						</div>
					</div>
					<?php } ?>
					<div class="user-field-group">
						<hr>
					</div>
					<?php if(!empty($user->description)){ ?>
					<div class="user-field-group">
						<div class="user-field-name">
							<?php _e('Sobre mi') ?>
						</div><br>
						<div class="user-field value user-bio justified">
							<?php echo nl2br(__($user->description, 'marcadordo')); ?>
						</div>
						<div class="user-field form-inline hide">
							<div class="form-group">
								<textarea class="form-control" placeholder="Sobre mi"><?php echo __($user->description, 'marcadordo'); ?></textarea>
							</div>
						</div>
					</div>
					<?php } ?>
					<div class="user-field-group">
						<?php echo get_toolset_usermeta("user-facebook"); ?>
						<?php echo get_toolset_usermeta("user-instagram"); ?>
						<?php echo get_toolset_usermeta("user-twitter"); ?>

						<br>
					</div>
					<!--  -->
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
			<!-- Marcador posts -->
			<div class="marcador-posts-listing-wrapper">
				<div class="container-fluid">
					<div class="row">
						<h2><?php _e("Tus más recientes posts."); ?></h2>
						<?php 

						if($query_own_posts->have_posts()):
							
							get_custom_pagination($query_own_posts->max_num_pages , $paged);
							
							while($query_own_posts->have_posts()): $query_own_posts->the_post(); 

							if(has_post_thumbnail()){
								$image = wp_get_attachment_image_src(get_post_thumbnail_id(), "middle");
								$image = $image[0];
							}
							
							$status = get_post_status();
							$post_categories = wp_get_post_categories(get_the_id());
						
							switch ($status) {
								case 'pending':
								case 'auto-draft':
								case 'future':								

									$status_cls = 'alert-warning';
									break;
								case 'private':
									$status_cls = 'alert-info';
									break;
								
								default:
									$status_cls = 'alert-success';
									break;
							}


							
						?>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 marcador-post-list">
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-4 col-sm-4 marcador-post-list-image-col">
										<a href="<?php the_permalink(); ?>" target='_blank'>
											<div class="marcador-post-list-image bg-size" style='background-image:url("<?php echo $image;?>")'></div>
										</a> 
										<div class="post-status text-capitalize alert <?php echo $status_cls; ?>"><?php echo get_post_status(); ?></div>
									</div>
									<div class="col-xs-8 col-sm-8">
										<div class="marcador-post-list-content">
											
											<div class="edit-post">
												<a href="<?php echo get_edit_post_link();?>" class="btn btn-primary" target="_blank"><?php _e('Editar'); ?></a>
											</div>

											<div class="marcador-post-list-category">
												<small><?php _e("Categorías"); ?></small>
												<?php the_category(); ?>
											</div>
											<div class="marcador-post-list-title">
												<a href="<?php the_permalink(); ?>" target='_blank'>
													<?php echo substr(get_the_title(),0, 70); ?>...
												</a>
											</div>
											<div class="marcador-post-list-excerpt">
												<?php echo substr(get_the_excerpt(), 0, 150); ?>...
											</div>
											<div class="marcador-post-list-meta">
												<br>
												<div class="marcador-post-list-author text-capitalize">
													
														<strong><?php the_author(); ?></strong>
													
												</div>

												|

												<div class="marcador-post-list-date">
													<?php echo get_the_date(); ?>
												</div>
												<?php if(check_favorite_category_user($post_categories) ){ ?>
												<!-- Conditional -->
												<div class="marcador-post-list-fav">
													<i class="material-icons">star</i>
												</div>
												<!-- end conditional -->
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> 
					<?php endwhile;

					get_custom_pagination($query_own_posts->max_num_pages , $paged);


					else:
						?>
					
						<div class="alert alert-warning">
							<?php echo sprintf(__('Lo siento, aún no has redactado posts. <a href="%s">Redactar un post</a>'), get_admin_url().'/post-new.php');?>
						</div>

				<?php endif; ?>
			</div>
		</div>
	</div>
	<!-- .marcador-posts-listing -->
	</div>
        <?php get_sidebar('marcador-user');?>
	</div>
</div>

</div>
</div>

<?php get_footer(); ?>