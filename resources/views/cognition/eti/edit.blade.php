@extends('cognition.eti.home')

@section('subcontent')

    <div class="bg_load">Please wait - loading..... <div class="spinner spinner-lg"></div></div>
    <div class="well well-sm" id="body" style="display: none;">
        <h4>Edit Document</h4>
        <br>
        @include('mceImageUpload::upload_form')
        {!! Form::open(
                [
                    'method' => 'PATCH',
                    'action' => [
                        'Cognition\EtiDocBrowserController@update',
                        $doc->id
                    ]
                ]
               ) !!}

        <div class="form-group">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', $doc->title , array('class' => 'form-control', 'style' => 'width: 100%; background-color: white;')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('type', 'Type') !!}
            {!! Form::select('type', array('' => '', 'eti' => 'Event Type Indicator Document', 'doc' => 'General Documentation', 'ci' => 'CI Document'), $doc->type , array('class' => 'form-control', 'style' => 'width: 250px; background-color: white;')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('status', 'Status') !!}
            {!! Form::select('status', array('' => '', 'review' => 'Pending Review', 'published' => 'Published', 'retired' => 'Retired'), $doc->status , array('class' => 'form-control', 'style' => 'width: 200px; background-color: white;')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('key', 'Event Type Indicator') !!}<br>
            {!! Form::select('key', $etiList, $doc->key, array('class' => 'form-control', 'style' => 'width: 400px; background-color: white;')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('purpose', 'Purpose / Scope') !!}
            {!! Form::textarea('purpose', $doc->getSection('purpose')->body ,array('class' => 'form-control', 'style' => 'width: 100%;')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('related', 'Related Documents') !!}
            {!! Form::textarea('related', $doc->getSection('related')->body ,array('class' => 'form-control', 'style' => 'width: 100%;') ) !!}
        </div>
        <div class="form-group">
            {!! Form::label('instructions', 'Instructions / Documentation') !!}
            {!! Form::textarea('instructions', $doc->getSection('instructions')->body ,array('class' => 'form-control', 'style' => 'width: 100%;') ) !!}
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
    .bg_load1 {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        background: #EEE;
    }
    .hideMe {
        display: none;
    }
@endpush

@push('end-scripts')
    $(document).ready(function() {

        tinymce.init({
            selector: 'textarea',
            height: 500,
            theme: 'modern',
            statusbar: false,
            //plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help',
            plugins: 'powerpaste searchreplace autolink directionality advcode visualblocks fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help',
            toolbar1: 'formatselect | undo redo | bold italic strikethrough forecolor backcolor | link image table anchor | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | fullscreen',
            removed_menuitems: 'file newdocument',
            image_advtab: true,
            relative_urls: false,
            file_browser_callback: function(field_name, url, type, win) {
                // trigger file upload form
                if (type == 'image') $('#formUpload input').click();
            },
            templates: [
                { title: 'Test template 1', content: 'Test 1' },
                { title: 'Test template 2', content: 'Test 2' }
            ],
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'
            ]
        });
        $('#key').select2();
        $('#body').toggle();
        $('.bg_load').toggle();

    });

    $('#confirmCancel').click(function() {
        document.location.href='/cognition/doc/eti';
    });
@endpush


@push('script-libraries')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="/assets/tinymce/js/tinymce/tinymce.min.js"></script>

@endpush
