<?php if ( is_active_sidebar( 'front-page' ) ) : ?>
<div id="sidebar" class="col-xs-12 div col-sm-12 col-md-12 col-lg-3">
	<div class="row">
		<?php dynamic_sidebar( 'front-page' ); ?>
	</div>
</div>
<?php endif; ?>
