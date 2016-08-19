<?php // Este es un layout temporal en lo que se maqueta el definitivo

$final_style = 'color:#f4f4f4; background-color: #333; border-right:1px solid #666; min-height: 150px;';
 ?>
<div id="cintillo" class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-lg-9">
      <div class="container-fluid">

      <div class="row" style="background-color: #333; ">
        <div class="col-xs-12 col-sm-12 col-lg-2" style="<?php echo $final_style; ?>">
          <div style="height: 150px;display: flex; align-items: center;">
            <select id="league" class="form-control">
              <option value="mlb" selected>MLB</option>
              <option value="lidom">LiDom</option>
            </select>

            <select id="league_day" class="form-control">
              <?php for ($i=0; $i < 3; $i++): $now = date('Y.m.d');  ?>
              <option value="<?php echo date('Y.m.d', strtotime("-$i day")); ?>" <?php if(0 == $i) echo 'selected'; ?> ><?php echo date('j M', strtotime("-$i day")); ?></option>
            <?php endfor; ?>
            </select>
          </div>

        </div>

        <div id="cintillo-results" class="col-xs-12 col-sm-12 col-lg-9" style="overflow-y: hidden; padding: 0; height: 150px;"> <!-- Results -->
          
        </div>
        <div class="col-xs-12 col-sm-12 col-lg-1" style="<?php echo $final_style; ?>"><a href="#next">NEXT</a></div>
      </div>

    </div>
    </div>
  </div>
  <script type="text/javascript">
  jQuery("#cintillo").ready(function() {
    var processData = function (data) {
      jQuery("#cintillo-results").empty();
      var stat_template = '<?php ob_start(); include( get_template_directory() . "/includes/marcador_cintillo_estadisticas_single.include.php" ); $string = ob_get_clean(); echo $string; ?>';
      var lol = jQuery(stat_template);
      var cintillo = data.cintillo;

      for (var i = 0, len=cintillo.length; i < len; i++) {
        var current = cintillo[i],
            html = lol.clone();

        html.find('h4.cintillo.field.title').text(current.status);
        //html.find('span.cintillo.field.image.home').text(current.home.abbr);
        html.find('span.cintillo.field.name.home').text(current.home.abbr);
        html.find('span.cintillo.field.score.home').text(current.home.runs);
        //html.find('span.cintillo.field.image.away').text(current.home.abbr);
        html.find('span.cintillo.field.name.away').text(current.away.abbr);
        html.find('span.cintillo.field.score.away').text(current.away.runs);

        jQuery("#cintillo-results").append(html);
        // TODO: Remove loading
      };
      console.log(data);
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

    getData(league, current, processData);
  });
  </script>
</div>