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
?>

<div id="marcador-page-template" class="search">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 div col-sm-12 col-md-12 col-lg-9">
				<ul class="marcador-nav top nav nav-pills">
					<li role="presentation" class="active">
						<a href="#beisbol" aria-controls="beisbol" role="tab" data-toggle="tab">Beísbol</a>
					</li>
					<li role="presentation">
						<a href="#baloncesto" aria-controls="baloncesto" role="tab" data-toggle="tab">Baloncesto</a>
					</li>
					<li role="presentation">
						<a href="#futbol" aria-controls="futbol" role="tab" data-toggle="tab">Fútbol</a>
					</li>
					<li role="presentation">
						<a href="#fut-americano" aria-controls="fut-americano" role="tab" data-toggle="tab">Fútbol Americano</a>
					</li>
				</ul>
				<div class="marcador-tabs tab-content top">
					<div role="tabpanel" class="tab-pane top active" id="beisbol">
						<ul class="marcador-nav marcador-sub nav nav-pills">
							<li role="presentation" class="active">
								<a href="#mlb" aria-controls="mlb" role="tab" data-toggle="tab">MLB</a>
							</li>
							<li role="presentation">
								<a href="#lidom" aria-controls="lidom" role="tab" data-toggle="tab">LIDOM</a>
							</li>
						</ul>
						<!--  -->
						<div class="marcador-tabs tab-content sub">
							<div role="tabpanel" class="tab-pane sub active" id="mlb">
								<h3 class="sub-tab heading">
									American League
								</h3>
								<div class="team-logos">
									<div class="container-fluid">
										<div class="row">
											<?php foreach( $americanleague_mlb as $id => $logo ): ?>
												<div class="col-xs-6 col-sm-4 col-md-4 col-lg-2 logo-col">
													<a href="#logo" class="fav-logo" data-logo="<?php echo $id; ?>">
														<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/imgs/american-league/<?php echo $logo; ?>" alt="">
													</a>
												</div>
											<?php endforeach; ?>
										</div>
									</div>
								</div>
								<h3 class="sub-tab heading">
									National League
								</h3>
								<div class="team-logos">
									<div class="container-fluid">
										<div class="row">
											<?php foreach( $nationalleague_mlb as $id => $logo ): ?>
												<div class="col-xs-6 col-sm-4 col-md-4 col-lg-2 logo-col">
													<a href="#logo" class="fav-logo" data-logo="<?php echo $id; ?>">
														<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/imgs/national-league/<?php echo $logo; ?>" alt="">
													</a>
												</div>
											<?php endforeach; ?>
										</div>
									</div>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane sub" id="lidom">
								Lidom
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane top" id="baloncesto">
						Baloncesto tab
					</div>
					<div role="tabpanel" class="tab-pane top" id="futbol">
						Futbol tab
					</div>
					<div role="tabpanel" class="tab-pane top" id="fut-americano">
						Futbol Americano
					</div>
				</div>
			</div>
		</div>
	</div> 
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