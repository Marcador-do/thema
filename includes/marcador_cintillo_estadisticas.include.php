<?php 
// 
// Este es un layout temporal en lo que se maqueta el definitivo
//
$final_style = 'color:#f4f4f4; background-color: #333; border-right:1px solid #666; min-height: 150px;'; 
?>
<div id="template-cintillo-layout-marcador" class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
			<!-- #cintillo -->
			<div id="cintillo">
				<div class="cintillo-row">
					<div class="cintillo-wrapper">
						<div class="cintillo-container">
							<div id="cintillo-selects-container">
								<div id="cintillo-selects">
									<select id="league" class="form-control">
										<option value="mlb" selected="selected">MLB</option>
										<option value="lidom">LiDom</option>
									</select>
									<select id="league_day" class="form-control">
										<?php for ($i=0; $i < 3; $i++): $now = date('Y.m.d');  ?>
											<option value="<?php echo date('Y.m.d', strtotime("-$i day")); ?>"<?php if( 0 == $i ) echo 'selected'; ?>>
												<?php echo date('j M', strtotime( "-$i day" )); ?>
											</option>
										<?php endfor; ?>
									</select>
									
								</div>
							</div> 
							<div id="cintillo-results-wrapper">
								<div id="cintillo-results"><?php /*
									DISPLAY RESULTS HERE
									*/ ?>
								</div>
							</div>
							
							<div class="cintillo-next-btn">
								<a href="#next">
									<i class="material-icons md-24">chevron_right</i>
								</a>
							</div>
						</div>

					</div>
				</div>
			</div>
			<!-- /#cintillo -->
		</div>
	</div>
</div>
<?php
$stat_template = <<<STAT_TEMPLATE
<div class="cintillo-result">
	<a href="#" placetext="Resumen">
		<h4 class="cintillo field title">STATUS</h4>
		<p class="cintillo field team">
			<span><img src="http://placehold.it/25" class="cintillo field image home"></span>&nbsp;&nbsp;
			<span class="cintillo field name home">TEAM_A</span>&nbsp;&nbsp;&nbsp;
			<span class="cintillo field score home">SCORE_A</span>
		</p>
		<p class="cintillo field team">
			<span><img src="http://placehold.it/25" class="cintillo field image away"></span>&nbsp;&nbsp;
			<span class="cintillo field name away">TEAM_B</span>&nbsp;&nbsp;&nbsp;
			<span class="cintillo field score away">SCORE_B</span>
		</p>
	</a>
</div>\n
STAT_TEMPLATE;
?>
<script type="text/javascript">
jQuery("#cintillo").ready(function() {
	var processData = function (data) {
		var result_width = 0;
		jQuery("#cintillo-results").empty();
		var stat_template = '<?php echo preg_replace( "/\r|\n/", "", $stat_template ); ?>';
		var lol = jQuery( stat_template );
		var cintillo = data.cintillo;

		for (var i = 0, len=cintillo.length; i < len; i++) {
			var current = cintillo[i],
				html = lol.clone();
				result_width = result_width + 150;

			html.find('h4.cintillo.field.title').text(current.status);
			//html.find('span.cintillo.field.image.home').text(current.home.abbr);
			html.find('span.cintillo.field.name.home').text(current.home.abbr);
			html.find('span.cintillo.field.score.home').text(current.home.runs);
			//html.find('span.cintillo.field.image.away').text(current.home.abbr);
			html.find('span.cintillo.field.name.away').text(current.away.abbr);
			html.find('span.cintillo.field.score.away').text(current.away.runs);


			jQuery("#cintillo-results").append(html).css('width', result_width + 35);
			
			// TODO: Remove loading
			
		};
		// console.log(data);
	};

	var getData = function (league, date, callback) {
		jQuery.ajax({
			url: '/wp-admin/admin-ajax.php',
			type: 'post',
			dataType: 'json',
			data: {action: 'cintillo', league:league, date:date},
			success: callback,
			error: function(err) {console.log(err);}
		});
	};

	var league  = jQuery("#league").val(),
	current = jQuery("#league_day").val();

	jQuery("#league_day").change(function() {
		// TODO: Show loading
		league  = jQuery("#league").val()
		current = jQuery(this).val();
		getData(league, current, processData);
	});

	/**
	 * Get ajax data
	 */
	getData(league, current, processData);

	/**
	 * Keep a control for every scroll
	 * @type {Number}
	 */
	var c = 0;

	/**
	 * Handle the cintillo scrolling horizontally
	 * @param  {obj} e)                {		var       _this         the obj scope
	 * @param  {int} options.duration: 300           the duration in miliseconds
	 * @param  {function} options.complete: function()    {		                                             	if( jQuery('#cintillo-results-wrapper').scrollLeft() + parent_result handle the callback result
	 * @param  {string} {		                                                            duration: 300,		                                                                                       complete: function( on complete check if we need to go back
	 * @return {function}                   callback to reselt c
	 */
	jQuery('.cintillo-next-btn [href="#next"]').click(function(e) {
		var _this = this;
		var parent_result = jQuery('#cintillo-results-wrapper').width();//important
		var childs_result = jQuery('#cintillo-results').width();

		e.preventDefault();
		
		if( c == 0 ) {
			jQuery('#cintillo-results-wrapper').animate({
		        scrollLeft: '+=150'
		    },{
		        duration: 300,
		        complete: function() {
		        	if( jQuery('#cintillo-results-wrapper').scrollLeft() + parent_result == childs_result ) {
		        		c = 1;
 		        	}
		        }
		    });
		} else {
			jQuery('#cintillo-results-wrapper').animate({
		        scrollLeft: '-=' + childs_result
		    },{
		        duration: 300,
		        complete: function() {
		        	c = 0;
		        }
		    });
		}
	});
});
</script>
