@extends('cognition.eti.home')

@section('subcontent')

    <div class="bg_load"></div>
    <div class="well well-sm" id="body" style="display: none;">
        <h4>Edit Document</h4>
        <br>
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
            {!! Form::textarea('purpose', $doc->getSection('purpose')->body ,array('class' => 'form-control summernote', 'style' => 'width: 100%;')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('related', 'Related Documents') !!}
            {!! Form::textarea('related', $doc->getSection('related')->body ,array('class' => 'form-control summernote', 'style' => 'width: 100%;') ) !!}
        </div>
        <div class="form-group">
            {!! Form::label('instructions', 'Instructions / Documentation') !!}
            {!! Form::textarea('instructions', $doc->getSection('instructions')->body ,array('class' => 'form-control summernote', 'style' => 'width: 100%;') ) !!}
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
    .bg_load {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        background: #EEE;
    }
@endpush

@push('end-scripts')

    tinymce.init({
        selector: 'textarea',
        height: 500,
        theme: 'modern',
        plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help',
        toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
        image_advtab: true,
        templates: [
        { title: 'Test template 1', content: 'Test 1' },
        { title: 'Test template 2', content: 'Test 2' }
        ],
        content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'
        ]
    });

@endpush

@push('end-scripts-donotuse')
    $(document).ready(function() {
        $('.summernote').summernote({
            toolbar:[
                ['cleaner',['cleaner']],
                ['style',['style']],
                ['font',['bold','italic','underline','clear']],
                ['fontname',['fontname']],
                ['color',['color']],
                ['para',['ul','ol','paragraph']],
                ['height',['height']],
                ['table',['table']],
                ['insert',['media','link','hr']],
                ['view',['fullscreen','codeview']],
                ['help',['help']]
            ],
            cleaner:{
                action: 'both',
                newline: '<br>',
                notStyle: 'position:absolute;top:0;left:0;right:0',
                icon: '<i class="note-icon">[Your Button]</i>',
                keepHtml: false,
                keepOnlyTags: ['<p>', '<br>', '<ul>', '<li>', '<b>', '<strong>','<i>', '<a>'],
                keepClasses: false,
                badTags: ['style', 'script', 'applet', 'embed', 'noframes', 'noscript', 'html'],
                badAttributes: ['style', 'start'],
                limitChars: false,
                limitDisplay: 'both',
                limitStop: false
            }
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
    <script src="/assets/tinymce/tinymce.min.js"></script>

@endpush

@push('script-libraries-DNU')
    <!-- include summernote css/js-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="summernote-cleaner.js"></script>
@endpush