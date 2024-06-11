@extends('index')

@section('content')
<div class="container">
    <center>
        <h1>There is no documentation for this item.</h1>
        Click the button below to request that documentation be provided for this item
        <br>
        <br>

<button class="btn btn-default" data-toggle="modal" data-target="#myModal">Request Documentation</button>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          <span class="pficon pficon-close"></span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Request Documentation</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-3 control-label" for="textInput-modal-markup">Item Identifier</label>
            <div class="col-sm-9">
              <input type="text" id="item-modal-markup" class="form-control" disabled value="{{ $id }}"></div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label" for="textInput2-modal-markup">Your Y ID</label>
            <div class="col-sm-9">
              <input type="text" id="userId-modal-markup" class="form-control" required></div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label" for="textInput3-modal-markup">Field Three</label>
            <div class="col-sm-9">
              <input type="text" id="textInput3-modal-markup" class="form-control">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
    </center>
</div>
@endsection
