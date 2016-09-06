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

$dimension = '300x225';
get_header(); ?>

<style>
	.well { background-color: #cdcdcd; padding: 15px; }
</style>
<div id="profile-page" class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
			<div class="user-profile">
				<!-- Please crop this image to be $dimension = 300x225  -->
				<div class="user-profile-picture">
					<img src="http://placehold.it/<?php echo $dimension; ?>&text=Marcador+User" alt="USER PROFILE" class="img-responsive">
				</div>
				div.user-profile-info
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			<div class="well">
				right
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>