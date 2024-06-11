<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          <span class="pficon pficon-close"></span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Edit Document Section</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-3 control-label" for="textInput-modal-markup">Item Identifier</label>
            <div class="col-sm-9">
              <input type="text" id="item-modal-markup" class="form-control" disabled value=""></div>
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


@push('end-scripts')

     $(document).on("click", ".open-EditDialog", function () {
          alert("called");
          var section = $(this).data('id');
          $(".myModalLabel").val("Edit Document ".myBookId." section" );
          // As pointed out in comments, 
          // it is superfluous to have to manually call the modal.
          // $('#addBookDialog').modal('show');
     });

@endpush
