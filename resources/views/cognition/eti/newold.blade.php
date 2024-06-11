@extends('cognition.eti.home')

@section('subcontent')

    <div class="well well-sm">
        <h4>Create new Document</h4>
        <br>
        {!! Form::open(array('url' => '/cognition/doc/eti/new')) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', '', array('class' => 'form-control', 'style' => 'width: 100%; background-color: white;')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('type', 'Type') !!}
                {!! Form::select('type', array('' => '', 'eti' => 'Event Type Indicator Document', 'doc' => 'General Documentation', 'ci' => 'CI Document'), null, array('class' => 'form-control', 'style' => 'width: 250px; background-color: white;')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('status', 'Status') !!}
                {!! Form::select('status', array('' => '', 'review' => 'Pending Review', 'published' => 'Published', 'retired' => 'Retired'), null, array('class' => 'form-control', 'style' => 'width: 200px; background-color: white;')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('key', 'Event Type Indicator') !!}<br>
                {!! Form::select('key', $etiList, null, array('class' => 'form-control', 'style' => 'width: 400px; background-color: white;')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('purpose', 'Purpose / Scope') !!}
                {!! Form::textarea('purpose', '',array('class' => 'form-control summernote', 'style' => 'width: 100%;') ) !!}
            </div>
            <div class="form-group">
                {!! Form::label('related', 'Related Documents') !!}
                {!! Form::textarea('related', '',array('class' => 'form-control summernote', 'style' => 'width: 100%;') ) !!}
            </div>
            <div class="form-group">
                {!! Form::label('instructions', 'Instructions / Documentation') !!}
                {!! Form::textarea('instructions', '',array('class' => 'form-control summernote', 'style' => 'width: 100%;') ) !!}
            </div>
            <div class="form-group">
                {!! Form::button('Cancel', ['id' => 'cancel', 'class' => 'btn btn-default', 'data-toggle' => 'modal', 'data-target' => '#confirmModal']) !!}
                {!! Form::submit('Save Document', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

    </div>


    @include('snippets.modals.form_cancel')

@endsection


@push('scripts')

@endpush

@push('local-css')

@endpush

@push('end-scripts')
$(document).ready(function() {
        $('.summernote').summernote();
        $('#key').select2();
    });

    $('#confirmCancel').click(function() {
        document.location.href='/cognition/doc/eti';
    });
@endpush

@push('script-libraries')
<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@endpush