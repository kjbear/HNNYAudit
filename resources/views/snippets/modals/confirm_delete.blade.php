<!-- Begin Cancel Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="ConfirmDeleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-warning" style="color: red; font-size: larger;"> Warning!</span> </h4>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this Document?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="delete">Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<!-- End Cancel Modal -->
@push('end-scripts')
    $('#delete').click(function () {
    $('#delete_form').submit();
    });
@endpush