<?php  
/**
 * [page-mis-esquipos.php]
 *
 * Page Mis Equipos template.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @author Richard Blondet <richardblondet.com>
 * @package marcadordo
 */

do_action('is_marcador_user_session');
$americanleague_mlb = array(
	'Baltimore-Orioles'	=>	'Baltimore-Orioles.jpg',
	'Chicago-White-Sox'	=>	'Chicago-White-Sox.jpg',
	'Cleveland-Indians'	=>	'Cleveland-Indians.jpg',
	'Detroit-Tigers'	=>	'Detroit-Tigers.jpg',
	'Houston-Astros'	=>	'Houston-Astros.jpg',
	'Kansas-City-Royals'	=>	'Kansas-City-Royals.jpg',
	'Los-Angeles-Angels'	=>	'Los-Angeles-Angels.jpg',
	'Minnesota-Twins'	=>	'Minnesota-Twins.jpg',
	'New-York-Yankees'	=>	'New-York-Yankees.jpg',
	'Oakland-Athletics'	=>	'Oakland-Athletics.jpg',
	'Seattle-Mariners'	=>	'Seattle-Mariners.jpg',
	'Tampa-Bay-Rays'	=>	'Tampa-Bay-Rays.jpg',
	'Texas-Rangers'	=>	'Texas-Rangers.jpg',
	'Toronto-Blue-Jays'	=>	'Toronto-Blue-Jays.jpg'
	);
$nationalleague_mlb = array(
	'Arizona-Diamondbacks'	=>	 'Arizona-Diamondbacks.jpg',
	'Atlanta-Braves'	=>	 'Atlanta-Braves.jpg',
	'Chicago-Cubs'	=>	 'Chicago-Cubs.jpg',
	'Cincinnati-Reds'	=>	 'Cincinnati-Reds.jpg',
	'Colorado-Rockies'	=>	 'Colorado-Rockies.jpg',
	'Los-Angeles-Dodgers'	=>	 'Los-Angeles-Dodgers.jpg',
	'Miami-Marlins'	=>	 'Miami-Marlins.jpg',
	'Milwaukee-Brewers'	=>	 'Milwaukee-Brewers.jpg',
	'New-York-Mets'	=>	 'New-York-Mets.jpg',
	'Philadelphia-Phillies'	=>	 'Philadelphia-Phillies.jpg',
	'Pittsburgh-Pirates'	=>	 'Pittsburgh-Pirates.jpg',
	'San-Diego-Padres'	=>	 'San-Diego-Padres.jpg',
	'San-Francisco-Giants'	=>	 'San-Francisco-Giants.jpg',
	'St.-Louis-Cardinals'	=>	 'St.-Louis-Cardinals.jpg',
	'Washington-Nationals'	=>	 'Washington-Nationals.jpg'
	);
get_header();
do_action('add_menu_marcador_user_section');

/*** Save Data Category Users ***/
$user_cat = $_POST['user_cats'];

$user_cat_com = get_user_meta_category_favorites();

if(is_array($user_cat) and count($user_cat) > 0){



	if(!empty(get_option( $user_cat_com))){
		update_option( $user_cat_com,  implode(', ', $user_cat) );
	} else{
		add_option( $user_cat_com,  implode(', ', $user_cat) );
	}


}

$user_cat_options = get_option( $user_cat_com);

if(!empty($user_cat_options)){
	$user_cat_options = explode(", ",$user_cat_options);
}
/*** End Save Data Category Users ***/



?>

<div id="marcador-page-template" class="wrap my-team-section">
	<form action="" method="post">
						
	<div id="main-content" class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				
				<h1><?php _e("Mis Equipos"); ?></h1>
				<p class="team-desc"><?php _e("Selecciona tus categorías favoritas.") ?></p>
				<blockquote class="info-help">
					<?php _e("Al seleccionar tus categorías favoritas, vas a obtener información única y exclusiva, relacionas a las categorías que selecciones.") ?>
				</blockquote>
				<input type='submit' class='btn btn-primary' value='Guardar Favoritos' />
				<br><br>
			</div>
            <?php get_sidebar('marcador-user');?>
		</div>
		<div class="row">

			<div class="col-lg-12">
				
				<!-- Tabs Menu -->
				<ul class="marcador-nav top nav nav-pills">


					<?php 
					foreach ($cat_tree as $cate_tree_val) {

						if(count($cate_tree_val['children']) === 0) {

							continue;
						}
						if($cate_tree_val['slug'] =="actividades")	continue;
						?>
						<li role="presentation">
							<a href="#tab-<?php echo $cate_tree_val['slug'];?>" aria-controls="<?php echo $cate_tree_val['slug'];?>" role="tab" data-toggle="tab"><?php echo $cate_tree_val['name'];?></a>
						</li>
						<?php      
					}
					?>

				</ul>
				<!-- end Tabs Menu -->


				<!-- Main Tags COntainer Liga -->	
				<div class="marcador-tabs tab-content top">
					
						<?php 
						foreach ($cat_tree as $cate_tree_val) {

							if(count($cate_tree_val['children']) == 0) {

								continue;
							}
							?>

							<!-- Main Subtabs COntainer Liga -->		
							<div role="tabpanel" class="tab-pane top subtabs" id="tab-<?php echo $cate_tree_val['slug'];?>">

								<ul class="marcador-nav marcador-sub nav nav-pills">

									<?php 
									$counter = true;
									foreach ($cate_tree_val['children'] as $cate_child_val) {

										if(count($cate_child_val['children']) == 0) {

											continue;
										}
										$_active = ($counter === true) ? "active" : "";
										?>
										<li role="presentation" class="<?php echo $_active; ?>">
											<a href="#tab-<?php echo $cate_child_val['slug']; ?>"  aria-controls="<?php echo $cate_child_val['slug']; ?>" role="tab" data-toggle="tab"><?php echo $cate_child_val['name']; ?></a>
										</li>

										<?php 
										$counter = false;     
									}
									?>	
								</ul>


								<!-- SubTabs COntainer Liga -->		
								<div class="marcador-tabs tab-content sub">
									<?php 
									$counter = true;
									foreach ($cate_tree_val['children'] as $cate_child_val) {

										if(count($cate_child_val['children']) == 0) {

											continue;
										}
										$_active = ($counter === true) ? "active" : "";
										?>
										<!-- Panel Liga -->	
										<div role="tabpanel" class="tab-pane sub <?php echo $_active; ?>" id="tab-<?php echo $cate_child_val['slug'];?>">

											<div class='league-wrap'>
												<?php 

												foreach ($cate_child_val['children'] as $cate_child_two_val) {

													if(count($cate_child_two_val['children']) == 0) {

														continue;
													}
													$_active = ($counter_two === true) ? "active" : "";
													?>
													<h3 class="sub-tab heading">
														<?php echo $cate_child_two_val['name'];?>
													</h3>
													<div class="team-logos">
														<div class="container-fluid">
															<div class="row">

																<?php 
																foreach ($cate_child_two_val['children'] as $cate_child_three_val) {
																	if(is_array($user_cat_options)){
																		$checked = (in_array($cate_child_three_val['term_id'], $user_cat_options) ) ? 'checked' : '';
																	}
																	$img_cat_url = get_term_meta($cate_child_three_val['term_id'],"wpcf-imagen-equipos");
																	?>

																	<div class="col-xs-6 col-sm-4 col-md-4 col-lg-2 logo-col">
																		<a href='#' title='<?php echo $cate_child_three_val['name']?>' class='cat-items'>
																			<input type='checkbox' class='input-checkbox ' <?php echo $checked;?> name='user_cats[]' value='<?php echo $cate_child_three_val['term_id'];?>' />
																			<?php if($img_cat_url){ ?>
																			<div class="fav-logo" data-logo="<?php echo $cate_child_three_val['slug']?>">
																				<img class="img-responsive" src="<?php echo $img_cat_url[0];?>" alt="<?php echo $cate_child_three_val['name']?>">
																			</div>
																			<?php } ?>
																		</a>
																	</div>
																	<?php
																}
																?>		
															</div>
														</div>
													</div>
													<?php 

												}
												?>
											</div>

										</div>		
										<!-- end Panel Liga -->	
										<?php     
										$counter = false;      
									}
									?>				
								</div>



								<!-- end SubTabs COntainer Liga -->		
							</div>

							<?php      
						}
						?>
					<!-- end Tags COntainer Liga -->	

				</div>
			</div>
		</div> 
	</div>
</form>
</div>
	<script type="text/javascript">
	function tabsInit() {
		var $tabNavs = jQuery('.marcador-nav.top a[data-toggle="tab"]');
		var $tabsCon = jQuery('.marcador-tabs.tab-content .tab-pane.top');

		var $subNavs = jQuery('.marcador-nav.marcador-sub a[data-toggle="tab"]');
		var $subsCon = jQuery('.marcador-tabs.tab-content .tab-pane.sub');

		$tabNavs.click(function(e) {
			e.preventDefault();
			$tabNavs.each(function(i, e) {
				jQuery(e).parent('li').removeClass('active');
			});
			$tabsCon.each(function(i, e) {
				jQuery(e).removeClass('active');
			});
			jQuery(this).parent('li').addClass('active');
			jQuery( jQuery(this).attr('href') ).addClass('active');
		});
		$subNavs.click(function(e) {
			e.preventDefault();
			$subNavs.each(function(i, e) {
				jQuery(e).parent('li').removeClass('active');
			});
			$subsCon.each(function(i, e) {
				jQuery(e).removeClass('active');
			});
			jQuery(this).parent('li').addClass('active');
			jQuery( jQuery(this).attr('href') ).addClass('active');
		});
	}
	jQuery(document).ready( tabsInit );
	</script>

	<?php get_footer(); ?>