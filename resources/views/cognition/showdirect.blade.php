@extends('cognition.eti.index')

@section('content')
<br>
<div class="container-fluid">
   <div class="well">
    <div class="container-fluid">
        <div class="row">
           <div class="col-md-10">
               <h5 class="view-post-title">{{ $doc->title }}</h5><br>

               <h4>{{ $doc->getSection('purpose')->title }}</h4>
               <hr style="margin: 10px; border-top:1px solid #DDD;">
               <span>{!! $doc->getSection('purpose')->body !!}</span>
                <br><br>

               @if(strip_tags($doc->getSection('related')->body) != "")
               <h4>{{ $doc->getSection('related')->title }}</h4>
               <hr style="margin: 10px; border-top:1px solid #DDD;">
               <span>{!! $doc->getSection('related')->body !!}</span>
               <br><br>
                @endif

               <h4>{{ $doc->getSection('instructions')->title }}</h4>
               <hr style="margin: 10px; border-top:1px solid #DDD;">
               <span>{!! $doc->getSection('instructions')->body !!}</span>
                <br><br>
           </div>
           <div class="col-md-2 hidden-sm hidden-xs">
               <div class="panel panel-default">
                   <div class="panel-body">
                       <br>



                       <span><i class="glyphicon glyphicon-info-sign"></i> Type:<br> {{ $typeList[$doc->type] }}</span>
                           <hr style="margin: 10px; border-top:1px solid #DDD;">
                       <span><i class="glyphicon glyphicon-user"></i> Author: {{ $doc->author->first }} {{ $doc->author->last }}</span>
                           <hr style="margin: 10px; border-top:1px solid #DDD;">
                       <span><i class="glyphicon glyphicon-calendar"></i><i title="{{ $doc->created_at->toDayDateTimeString() }}"> {{ $doc->created_at->diffForHumans() }}</i></span>
                           @if(env('COGNITION_COMMENTS') == "true")     <hr style="margin: 10px; border-top:1px solid #DDD;">
                       <span><i class="glyphicon glyphicon-comment"></i> {{ $doc->comments->count() }} comments</span> @endif
                           @if(env('COGNITION_TAGS') == "true") <hr style="margin: 10px; border-top:1px solid #DDD;">
                        <span><i class="glyphicon glyphicon-tags"></i> Tags</span>
                           @isset($doc->tags)
                               @if($doc->tags->count() > 0)
                                   @foreach ($doc->tags as $tag)
                                       <a href="#"><span class="label label-default">{{ $doc->text }}</span></a>
                                   @endforeach
                               @else
                                   &nbsp;&nbsp;None
                               @endif
                           @endisset
                           @empty($doc->tags)
                               &nbsp;&nbsp;None
                           @endempty
                        @endif

                   </div>
                   @include('snippets.modals.confirm_delete')

                   </div>
               </div>
           </div>

        </div>
   </div>
</div>



@endsection

@push('scripts')

@endpush

@push('local-css')
    .view-post-title {
        font-style: oblique;
        text-decoration: underline;
        font-size: 18pt;
    }
@endpush

@push('end-scripts')
    $('#edit').click(function() {
    window.location.href='/cognition/doc/eti/{{ $doc->id }}/edit';
    return false;
    });

    $('#openDeleteModal').click( function() {
    $('#ConfirmDeleteModal').modal('show');
    return false;
    });

@endpush

@push('script-libraries')

@endpush