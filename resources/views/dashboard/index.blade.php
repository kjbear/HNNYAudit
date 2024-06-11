@extends('index')

@section('content')
<div class="cards-pf">
  <div class="container-fluid container-cards-pf">
    <div class="row row-cards-pf">
     <!-- <div class="col-xs-6 col-sm-4 col-md-4">
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
        </div> <!-- /row
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
        </div> <!-- /row 
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
        </div> <!-- /row 
      </div> <!-- /column   -->
      <div class="col-sm-4 col-md-4">
        <div class="card-pf fixHeight card-pf-accented card-pf-aggregate-status">
          <h2 class="card-pf-title pull-left" style="margin-left: 30px;">
            <span class="fa pficon-route" style="font-size: 14pt;"></span><span style="font-size: 14pt;">Integration Status</span>
          </h2>
	  <p class="card-pf-utilization-details">
	  </p>
          <div class="card-pf-body">
		<table class="datatable table table-striped table-bordered">
  <thead>
    <tr>
      <th style="text-align: center; width:40%">Name</th>
      <th style="text-align: center; width:50%">API Endpoint</th>
      <th style="text-align: center; width:10%">Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($integrations as $intgr)
    <tr>
      <td>{{ $intgr->name }}</td>
      <td>{{ $intgr->endpoint }}</td>
      <td align="center"><span class="pficon {{ $intgr->latestStatus->status->icon or 'pficon-help' }}" style="font-size: 14pt; margin-top: 5px;"></span></td>
    </tr>
    @endforeach
  </tbody>
</table>
<script>
  // Initialize Datatables
  $(document).ready(function() {
 @if (count($integrations) > 10) 
     $('.datatable').dataTable();
 @endif   
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

</div>
@endsection
