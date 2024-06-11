@if (empty($workerCount) || $workerCount == 0)
<div class="list-group-item" style="background-color: #FDBEBE;">
@elseif ($failedLength > 0) 
<div class="list-group-item" style="background-color: #dcf442;">
@else
<div class="list-group-item" style="background-color: #87C781;">
@endif
  <div class="list-group-item-header">
    <div class="list-view-pf-expand">
      <span class="fa fa-angle-right"></span>
    </div>
    <div class="list-view-pf-checkbox">
      <input type="checkbox">
    </div>
    <div class="list-view-pf-main-info">
      @if (!empty($workerCount) && $workerCount > 0)
      <span class="fa pficon-ok"></span>
      @else
      <span class="fa pficon-error-circle-o"></span>
      @endif
    <div class="list-view-pf-body">
      <div class="list-view-pf-description">
        <div class="list-group-item-heading">
            Queue
        </div>
        <div class="list-group-item-text">
          {{ $queueName }}
        </div>
      </div>
      <div class="list-view-pf-additional-info-item">
        <span class="fa fa-list-ol"></span>
        <strong>{{ $workerCount }}</strong> Workers
      </div>
      <div class="list-view-pf-additional-info-item">
        <span class="fa fa-thumbs-up"></span>
        <strong>{{ $queueLength }}</strong> Pending 
      </div>
      <div class="list-view-pf-additional-info-item">
        <span class="fa fa-thumbs-down"></span>
        <strong>{{ $failedLength }}</strong> Failed
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
      </div>
    </div>
  </div>
</div>
