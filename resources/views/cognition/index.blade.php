@extends('index')

@section('content')
<div class="container">
    <div class="well">
        <div class="row">
            <div class="col-md-3">
                <img src="/assets/img/logo_main.png" alt="HealthNow New York" width="100%">
                <br><br>
                <span style="font-weight: bold; font-size: 14pt;"><center>Knowedge Base</center></span>
            </div>
            <div class="col-md-9" style="padding-left: 30px;">
                <table class="table table-hover table-bordered">
                    <thead>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width:30%; font-weight: bold;">Description</td>
                            <td>{{ $doc->title }}</td>
                        </tr>
                        <tr>
                            <td style="width:30%; font-weight: bold;">Document #</td>
                            <td>{{ $doc->document_number }}</td>
                        </tr>
                        <tr>
                            <td style="width:30%; font-weight: bold;">Authored By</td>
                            <td>{{ $doc->author->first }} {{ $doc->author->last }} ({{ $doc->author->login }})</td>
                        </tr>
                        <tr>
                            <td style="width:30%; font-weight: bold;">Authored Date</td>
                            <td>{{ $doc->created_at }}</td>
                        </tr>
                        <tr>
                            <td style="width:30%; font-weight: bold;">Updated By</td>
                            <td>@isset($doc->editor) {{ $doc->editor->first }} {{ $doc->editor->last }} ({{ $doc->editor->login }}) @endisset</td>
                        </tr>
                        <tr>
                            <td style="width:30%; font-weight: bold;">Updated Date</td>
                            <td>{{ $doc->updated_at }}</td>
                        </tr>
                        <tr>
                            <td style="width:30%; font-weight: bold;">Tags</td>
                            <td>{{ $doc->updated_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<div style="padding-left: 40px; padding-right:40px;">
    <div class="panel panel-default">
        <div class="panel-heading">
           <span style="font-weight: bold;">{{ $doc->getSection('purpose')->title }}  - 
              <button type="button" class="btn btn-default" data-toggle="modal" data-id="purpose" data-target="#editModal" id="openEditorpurpose">Edit</button>
              </span>
        </div>
        <div class="panel-body" id="purpose">
           {!! $doc->getSection('purpose')->body !!}
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
           <span style="font-weight: bold;">{{ $doc->getSection('related')->title }} -  
              <button type="button" class="btn btn-default" data-toggle="modal" data-id="related" data-target="#editModal" id="openEditorrelated">Edit</button>
           </span>
        </div>
        <div class="panel-body" id="related">
           {!! $doc->getSection('related')->body !!}
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
           <span style="font-weight: bold;">{{ $doc->getSection('instructions')->title }} - 
              <button type="button" class="btn btn-default" data-toggle="modal" data-id="instructions" data-target="#editModal" id="openEditorinstructions">Edit</button>
           </span>
        </div>
        <div class="panel-body" id="instructions">
           {!! $doc->getSection('instructions')->body !!}
        </div>
    </div>
</div>


@endsection

@push('script-libraries')

      <!-- include summernote css/js-->
      <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
      <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>

@endpush
  

@push('end-scripts')
     var dirty    = false;
     var original = null;
     $(document).on("click", "[id^=openEditor]", function () {
          var section = $(this).data('id');
          console.log(section);
          $('[id^=openEditor]').prop('disabled', true);
          $("#"+section).summernote({
              focus: true,
              callbacks: {
                  onChange: function() {
                     if (!dirty) {
                         original = $("#"+section).summernote('code');
                         console.log('Contents of section '+section+' have changed'); 
                         console.log('Original text: '+original); 
                         original = $("#"+section).summernote('code');
                         dirty = true;
                         
                         $('#'+section+'Cancel').click(function() {
                             console.log('You sure you wanna do this?');
                             
                         });
                         $('#'+section+'Save').prop('disabled',false);
                         $('#'+section+'Save').click(function() {
                             $.post(
                                 "/cognition/api/updateSection",
                                 {
                                     document_id:   "{{ $doc->id }}",
                                     name:          section,
                                     body:          $("#"+section).summernote('code'),
                                     _token:        "{{ csrf_token() }}"
                                 }
                             ).done(function(data) {
                                 console.log('Section saved');
                             });
                             dirty = false
                             $("#"+section).summernote('destroy');
                             $('#editButtons').remove(); 
          		     $('[id^=openEditor]').prop('disabled', false);
                         });
                     }
                  }
              }
          });
          $("#"+section).parent().append("<div id=\"editButtons\" style=\"padding-left: 20px; padding-bottom: 10px;\"><button type=\"cancel\" class=\"btn btn-default\" data-id=\""+section+"\" id=\""+section+"Cancel\">Cancel</button>&nbsp;&nbsp;<button type=\"submit\" class=\"btn btn-primary\" data-id=\""+section+"\" id=\""+section+"Save\" disabled>Save</button></div>"); 
     });

     $(window).on('beforeunload', function() {
        if (dirty) {
          console.log('Hey man!  This thing is all dirty!');
          return false;
        }
     });
// {{ csrf_field() }}
@endpush
