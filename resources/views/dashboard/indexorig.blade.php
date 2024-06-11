@extends('index')

@section('content')
<div class="cards-pf">
  <div class="container-fluid container-cards-pf">
    <div class="row row-cards-pf">
      <div class="col-xs-6 col-sm-4 col-md-4">
        <div class="card-pf fixHeight card-pf-accented card-pf-aggregate-status">
  <h2 class="card-pf-title">
    <span class="fa fa-phone" style="font-size: 24pt;"></span><span style="font-size: 18pt;">Service Desk Call Volume<span>
  </h2>
  <div class="card-pf-body">
	<br>
    <p class="card-pf-aggregate-status-notifications">
      <span class="card-pf-aggregate-status-notification"><span class="pficon-ok" style="font-size: 24pt;"></span>&nbsp;&nbsp;&nbsp;4 calls in queue</span>
    </p>
<div class="chart-pf-sparkline" id="call_volume"></div>
  </div>
</div>

      </div>
      <div class="col-xs-6 col-sm-4 col-md-4">
        <div class="card-pf fixHeight card-pf-accented card-pf-aggregate-status" style="background-color: #ffb3b3 !important;">
          <h2 class="card-pf-title">
            <span class="fa fa-exclamation-circle" style="font-size: 24pt;"></span><span style="font-size: 18pt;">High Severity Incidents</span>
          </h2>
          <div class="card-pf-body">
          <br>
          <p class="card-pf-aggregate-status-notifications">
            <span class="card-pf-aggregate-status-notification"><a href="#"><span class="pficon pficon-error-circle-o" style="font-size: 24pt;"></span>1</a></span>
          </p>
          <br><span>Impacts</span>
          <br>
             <span class="label label-default">FACETS</span>&nbsp;|&nbsp;<span class="label label-default">NICE</span>&nbsp;|&nbsp;<span class="label label-default">D-Series</span>
       </div>
     </div>

      </div>
      <div class="col-xs-6 col-sm-4 col-md-4">
        <div class="card-pf fixHeight card-pf-accented card-pf-aggregate-status">
  <h2 class="card-pf-title">
    <span class="fa fa-building" style="font-size: 24pt;"></span><span style="font-size: 18pt;">Location Health</span>
  </h2>
  <div class="card-pf-body">
    <p class="card-pf-aggregate-status-notifications">
     <div class="row">
	<div class="col-xs-1">
      	 <span class="pficon pficon-ok" style="font-size: 14pt; padding-top: 8px;"></span><br>
	</div>
	<div class="col-xs-4">
	  <span class="pull-left" style="font-size: 14pt;">Buffalo</span>
	</div>
	<div class="col-xs-1">
      	 <span class="pficon pficon-ok" style="font-size: 14pt; padding-top: 8px;"></span><br>
	</div>
	<div class="col-xs-4">
	  <span class="pull-left" style="font-size: 14pt;">Albany</span>
	</div>
	</div>
       <div class="row">
	<div class="col-xs-1">
     	  <span class="pficon pficon-ok" style="font-size: 14pt; padding-top: 8px;"></span><br>
	</div>
	<div class="col-xs-4">
	  <span class="pull-left" style="font-size: 14pt;">Endicott</span>
	</div>
	<div class="col-xs-1">
     	  <span class="pficon pficon-ok" style="font-size: 14pt; padding-top: 8px;"></span><br>
	</div>
	<div class="col-xs-4">
	  <span class="pull-left" style="font-size: 14pt;">Blue Bell</span>
	</div>
     </div>
       <div class="row">
	<div class="col-xs-1">
     	  <span class="pficon pficon-ok" style="font-size: 14pt; padding-top: 8px;"></span><br>
	</div>
	<div class="col-xs-4">
	  <span class="pull-left" style="font-size: 14pt;">Sacramento</span>
	</div>
     </div>
     </div>
    </p>
  </div>
</div>
</div>
<br>
    <div class="row row-cards-pf"> 
	<div class="col-xs-8 col-sm-3 col-md-3">
           <div class="card-pf fixHeight card-pf-accented card-pf-utlization">
	      <h2 class="card-pf-title">
	        <span class="pficon pficon-route" style="font-size: 14pt;"></span><span style="font-size: 14pt;">&nbsp;&nbsp;Internet Bandwidth Utilization<span>
	      </h2>
	      <div class="card-pf-body">
	         <p class="card-pf-utilization-details">
                    <span class="card-pf-utilization-card-details-count">200 Gbps</span>
                    <span class="card-pf-utilization-card-details-description">
                       <span class="card-pf-utilization-card-details-line-1">Available</span>
                       <span class="card-pf-utilization-card-details-line-2">of 1300 Gbps</span>
                    </span>
                 </p>
                 <div id="chart-pf-donut-5"></div>
                 <div class="chart-pf-sparkline" id="internet-bandwidth"></div>
              </div>
           </div>
        </div>
	<div class="col-xs-8 col-sm-3 col-md-3">
          <div class="row">
	    <div class="col-sm-12">
	      <div class="card-pf card-pf-accented card-pf-aggregate-status">
                <h2 class="card-pf-title">
                  <span class="fa fa-lock" style="font-size: 14pt;"></span><span style="font-size: 14pt;">Information Security Status</span>
                </h2>
                <div class="card-pf-body">
                <br>
                <p class="card-pf-aggregate-status-notifications">
                  <span class="card-pf-aggregate-status-notification"><span class="pficon pficon-ok" style="font-size: 18pt;"></span>Status Normal</span>
                </p>
              </div>
            </div>
          </div>
        </div> <!-- /row -->
	<div class="row">
	  <div class="col-sm-12">
            <div class="card-pf card-pf-accented card-pf-aggregate-status">
              <h2 class="card-pf-title">
                <span class="fa fa-lock" style="font-size: 14pt;"></span><span style="font-size: 14pt;">Information Security Status</span>
              </h2>
              <div class="card-pf-body">
                <br>
                <p class="card-pf-aggregate-status-notifications">
                  <span class="card-pf-aggregate-status-notification"><span class="pficon pficon-ok" style="font-size: 18pt;;"></span>Status Normal</span>
                </p>
              </div>
            </div>
          </div>
        </div> <!-- /row -->
	<div class="row">
          <div class="col-sm-12">
            <div class="card-pf card-pf-accented card-pf-aggregate-status">
              <h2 class="card-pf-title">
                <span class="fa fa-lock" style="font-size: 14pt;"></span><span style="font-size: 14pt;">Information Security Status</span>
              </h2>
              <div class="card-pf-body">
                <br>
                <p class="card-pf-aggregate-status-notifications">
                  <span class="card-pf-aggregate-status-notification"><span class="pficon pficon-ok" style="font-size: 18pt;"></span>Status Normal</span>
                </p>
              </div>
            </div>
          </div>
        </div> <!-- /row -->
      </div> <!-- /column -->
      <div class="col-sm-6 col-md-6">
        <div class="card-pf fixHeight card-pf-accented card-pf-aggregate-status">
          <h2 class="card-pf-title pull-left" style="margin-left: 30px;">
            <span class="fa fa-lock" style="font-size: 14pt;"></span><span style="font-size: 14pt;">Application Status</span>
          </h2>
	  <p class="card-pf-utilization-details">
	  </p>
          <div class="card-pf-body">
		<table class="datatable table table-striped table-bordered">
  <thead>
    <tr>
      <th>Status</th>
      <th>Name</th>
      <th>Performance</th>
      <th>History</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td align="center"><span class="pficon pficon-ok" style="font-size: 14pt; margin-top: 5px;"></span></td>
      <td>Infrastructure</td>
      <td><span class="pficon pficon-warning-triangle-o"></span>&nbsp&nbspWarning&nbsp;&nbsp<span class="pficon pficon-trend-up" style="color: #c00;"></span></div></td>
      <td style="max-width: 160px;"><div class="chart-pf-sparkline" id="infrastructure-history"></td>
    </tr>
    <tr>
      <td align="center"><span class="pficon pficon-ok" style="font-size: 14pt; margin-top: 5px;"></span></td>
      <td>Internet Sites</td>
      <td><span class="pficon pficon-ok"></span>&nbsp&nbspNormal&nbsp;&nbsp</div></td>
      <td style="max-width: 160px;"><div class="chart-pf-sparkline" id="internet-history"></td>
    </tr>
    <tr>
      <td align="center"><span class="pficon pficon-ok" style="font-size: 14pt; margin-top: 5px;"></span></td>
      <td>Claims</td>
      <td><span class="pficon pficon-ok"></span>&nbsp&nbspNormal&nbsp;&nbsp</div></td>
      <td style="max-width: 160px;"><div class="chart-pf-sparkline" id="claims-history"></div></td>
    </tr>
    <tr>
      <td align="center"><span class="pficon pficon-ok" style="font-size: 14pt; margin-top: 5px;"></span></td>
      <td>Customer Service</td>
      <td><span class="pficon pficon-ok"></span>&nbsp&nbspNormal&nbsp;&nbsp</div></td>
      <td style="max-width: 160px;"><div class="chart-pf-sparkline" id="customerservice-history"></td>
    </tr>
    <tr>
      <td align="center"><span class="pficon pficon-ok" style="font-size: 14pt; margin-top: 5px;"></span></td>
      <td>Finance</td>
      <td><span class="pficon pficon-ok"></span>&nbsp&nbspNormal&nbsp;&nbsp</div></td>
      <td style="max-width: 160px;"><div class="chart-pf-sparkline" id="finance-history"></td>
    </tr>
    <tr>
      <td align="center"><span class="pficon pficon-ok" style="font-size: 14pt; margin-top: 5px;"></span></td>
      <td>Human Resources</td>
      <td><span class="pficon pficon-ok"></span>&nbsp&nbspNormal&nbsp;&nbsp</div></td>
      <td style="max-width: 160px;"><div class="chart-pf-sparkline" id="hr-history"></td>
    </tr>
  </tbody>
</table>
<script>
  // Initialize Datatables
  $(document).ready(function() {
//    $('.datatable').dataTable();
  });
</script>
	  </div>
	</div>
      </div>

    </div>

</div><!-- /row -->

</div><!-- /container -->
  <script>
    $(function() {
      // matchHeight the contents of each .card-pf and then the .card-pf itself
      $(".row-cards-pf > [class*='col'] > .fixHeight .card-pf-title").matchHeight();
      $(".row-cards-pf > [class*='col'] > .fixHeight > .card-pf-body").matchHeight();
      $(".row-cards-pf > [class*='col'] > .fixHeight > .card-pf-footer").matchHeight();
      $(".row-cards-pf > [class*='col'] > .fixHeight").matchHeight();
      // initialize tooltips
      $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<script>
    var c3ChartDefaults = $().c3ChartDefaults();

    var sparklineConfig = c3ChartDefaults.getDefaultSparklineConfig();
      sparklineConfig.bindto = '#call_volume';
      sparklineConfig.data = {
        columns: [
          ['calls', 6, 5, 7, 4, 3, 6, 5, 4, 5, 7, 6, 6, 6, 8, 25, 8, 1, 4],
        ],
        type: 'area'
      };

      var chart2 = c3.generate(sparklineConfig);
 </script>
<script>
      var c3ChartDefaults = $().c3ChartDefaults();

      var donutConfig = c3ChartDefaults.getDefaultDonutConfig('A');
      donutConfig.bindto = '#chart-pf-donut-5';
      donutConfig.color =  {
        pattern: ["#EC7A08","#D1D1D1"]
      };
      donutConfig.data = {
        type: "donut",
        columns: [
          ["Used", 85],
          ["Available", 15]
        ],
        groups: [
          ["used", "available"]
        ],
        order: null
      };
      donutConfig.tooltip = {
        contents: function (d) {
          return '<span class="donut-tooltip-pf" style="white-space: nowrap;">' +
                  Math.round(d[0].ratio * 100) + '%' + ' Gbps ' + d[0].name +
                  '</span>';
        }
      };

      var chart1 = c3.generate(donutConfig);
      var donutChartTitle = d3.select("#chart-pf-donut-5").select('text.c3-chart-arcs-title');
      donutChartTitle.text("");
      donutChartTitle.insert('tspan').text("1100").classed('donut-title-big-pf', true).attr('dy', 0).attr('x', 0);
      donutChartTitle.insert('tspan').text("Gbps Used").classed('donut-title-small-pf', true).attr('dy', 20).attr('x', 0);

      var sparklineConfig = c3ChartDefaults.getDefaultSparklineConfig();
      sparklineConfig.bindto = '#internet-bandwidth';
      sparklineConfig.data = {
        columns: [
          ['%', 60, 55, 70, 44, 31, 67, 54, 46, 58, 75, 62, 68, 69, 88, 74, 88, 85],
        ],
        type: 'area'
      };

      var chart2 = c3.generate(sparklineConfig);

      var sparklineConfig = c3ChartDefaults.getDefaultSparklineConfig();
      sparklineConfig.bindto = '#infrastructure-history';
      sparklineConfig.size = { height: 35 };
      sparklineConfig.data = {
        columns: [
          ['%', 60, 55, 70, 44, 31, 67, 54, 46, 58, 75, 62, 68, 69, 88, 74, 88, 85],
        ],
        type: 'area'
      };

      var chart2 = c3.generate(sparklineConfig);
  
      var sparklineConfig = c3ChartDefaults.getDefaultSparklineConfig();
      sparklineConfig.bindto = '#internet-history';
      sparklineConfig.size = { height: 35 };
      sparklineConfig.data = {
        columns: [
          ['%', 30, 25, 40, 20, 50, 30, 30, 42, 25, 25, 30, 30, 30,30, 50, 70, 75],
        ],
        type: 'area'
      };

      var chart2 = c3.generate(sparklineConfig);

      var sparklineConfig = c3ChartDefaults.getDefaultSparklineConfig();
      sparklineConfig.bindto = '#claims-history';
      sparklineConfig.size = { height: 35 };
      sparklineConfig.data = {
        columns: [
          ['%', 30, 25, 40, 20, 50, 30, 30, 42, 25, 25, 30, 30, 30, 30, 45, 30, 40],
        ],
        type: 'area'
      };

      var chart2 = c3.generate(sparklineConfig);

      var sparklineConfig = c3ChartDefaults.getDefaultSparklineConfig();
      sparklineConfig.bindto = '#customerservice-history';
      sparklineConfig.size = { height: 35 };
      sparklineConfig.data = {
        columns: [
          ['%', 30, 25, 40, 20, 50, 30, 30, 42, 25, 25, 30, 30, 30, 30, 45, 30, 40],
        ],
        type: 'area'
      };

      var chart2 = c3.generate(sparklineConfig);

      var sparklineConfig = c3ChartDefaults.getDefaultSparklineConfig();
      sparklineConfig.bindto = '#finance-history';
      sparklineConfig.size = { height: 35 };
      sparklineConfig.data = {
        columns: [
          ['%', 30, 25, 40, 20, 50, 30, 30, 42, 25, 25, 30, 30, 30, 30, 45, 30, 40],
        ],
        type: 'area'
      };

      var chart2 = c3.generate(sparklineConfig);

      var sparklineConfig = c3ChartDefaults.getDefaultSparklineConfig();
      sparklineConfig.bindto = '#hr-history';
      sparklineConfig.size = { height: 35 };
      sparklineConfig.data = {
        columns: [
          ['%', 30, 25, 40, 20, 50, 30, 30, 42, 25, 25, 30, 30, 30, 30, 45, 30, 40],
        ],
        type: 'area'
      };

      var chart2 = c3.generate(sparklineConfig);


    </script>

</div>
@endsection
