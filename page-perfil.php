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
					<img src="http://placehold.it/<?php echo $dimension; ?>&text=Marcador+User" alt="USER PROFILE" class="img-responsive">
				</div>
				<p>
					<button class="btn btn-default marcador-special edit-profile" data-action="edit">Editar</button>
					<button class="btn btn-default marcador-special edit-profile hide" data-action="save">Guardar</button>
				</p>
				<div class="user-profile-info">
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
							Nombre
						</div>
					</div>
					<div class="user-field-group">
						<div class="user-field value">
							<?php
							if ($user_meta->marcador_moreinfo) {
								$more = maybe_unserialize($user_meta->marcador_moreinfo);
								// TODO: print phone number if available
								var_dump($more);
							} else {
								echo '(809) 234-4321';
							}
							?>
						</div>
						<div class="user-field form-inline hide">
							<div class="form-group">
								<input type="tel" placeholder="Móvil"
									   value="<?php echo __('(809) 234-4321', 'marcadordo'); ?>"
									   class="form-control">
							</div>
						</div>
						<div class="user-field-name">
							Móvil
						</div>
					</div>
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
							Email
						</div>
					</div>
					<div class="user-field-group">
						<hr>
					</div>
					<div class="user-field-group">
						<div class="user-field-name">
							Sobre mi
						</div><br>
						<div class="user-field value justified">
							<?php echo __($user->description, 'marcadordo'); ?>
						</div>
						<div class="user-field form-inline hide">
							<div class="form-group">
								<textarea class="form-control" placeholder="Sobre mi"><?php echo __($user->description, 'marcadordo'); ?></textarea>
							</div>
						</div>
					</div>
					<div class="user-field-group">
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
						<?php for ($i=0; $i <= 3; $i++): ?>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 marcador-post-list">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-4 col-sm-4 marcador-post-list-image-col">
											<a href="#post-permalink">
												<div class="marcador-post-list-image"></div>
											</a> 
										</div>
										<div class="col-xs-8 col-sm-8">
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
												<div class="marcador-post-list-excerpt">
													<p>
														Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi doloribus quasi ducimus facere, recusandae, qui aperiam dolores. Eum distinctio consequuntur officiis. Culpa nobis aliquid fuga, nesciunt mollitia tempora! Hic, modi.
													</p>
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
	</div>
</div>

<?php get_footer(); ?>