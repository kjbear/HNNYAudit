@if ($job->statusSummary() == 'Bad')
<div class="list-group-item" style="background-color: #FDBEBE;">
@elseif ($job->statusSummary() == 'Good')
<div class="list-group-item" style="background-color: #87C781;">
@else
<div class="list-group-item">
@endif
    <div class="list-group-item-header">
      <div class="list-view-pf-expand">
        <span class="fa fa-angle-right"></span>
      </div>
      <div class="list-view-pf-checkbox">
        <input type="checkbox">
      </div>
            <div class="list-view-pf-actions">
              {{ Carbon\Carbon::parse($job->created_at)->format('m-d-y h:i A') }}
            </div>
      <div class="list-view-pf-main-info">
        <div class="list-view-pf-left">
          @if ($job->statusSummary() == 'Good')
          <span class="fa pficon-ok"></span>
          @else
          <span class="fa pficon-error-circle-o"></span>
          @endif
        </div>
        <div class="list-view-pf-body">
          <div class="list-view-pf-description">
            <div class="list-group-item-heading">
              {{ $job->type->name }}
            </div>
            <div class="list-group-item-text">
              {{ $job->type->description }}
            </div>
          </div>
          <div class="list-view-pf-additional-info">
            <div class="list-view-pf-additional-info-item">
              <span class="fa fa-map-signs"></span>
              Audit check
            </div>
            <div class="list-view-pf-additional-info-item">
              <span class="fa fa-list-ol"></span>
              <strong>{{ $job->results->count() }}</strong> Total Checks
            </div>
            <div class="list-view-pf-additional-info-item">
              <span class="fa fa-thumbs-up"></span>
              <strong>{{ $job->goodCount() }}</strong> Passed 
            </div>
            <div class="list-view-pf-additional-info-item">
              <span class="fa fa-thumbs-down"></span>
              <strong>{{ $job->badCount() }}</strong> Failed
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="list-group-item-container container-fluid hidden">
      <div class="close">
        <span class="pficon pficon-close"></span>
      </div>
      <div class="row">
        <div class="col-md-3">
          
        </div>
        <div class="col-md-9">
           @includeif('partials.tests.'.$job->type->view_partial_name)
        </div>
      </div>
    </div>
  </div>
