@extends('cognition.eti.home')

@section('subcontent')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                Blah blah blah.  Stuff about how awesome this system is.
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <!--<div class="col-xs-6 col-sm-6 col-md-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Quick Actions</div>
                    <div class="panel-body">
                        <div style="padding-bottom:5px;">
                            <div class="btn-group btn-group-sm">

                                <button type="button" class="btn btn-primary btn-sm" data-url="/cognition/doc/eti/new" style="width:75px;"><span class="glyphicon glyphicon-pencil" style="padding-right: 10px;"></span><span>New</span></button>
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">ETI Document</a></li>
                                    <li><a href="#">CI Document</a></li>
                                    <li><a href="#">Link to Document</a></li>

                                </ul>
                            </div>
                        </div>
                        <div style="padding-bottom:5px;">
                            <button type="button" class="btn btn-primary btn-sm" data-url="/cognition/doc/eti/browse" style="width:100px;"><span class="glyphicon glyphicon-list" style="padding-right: 10px;"></span><span>Browse</span></button>
                        </div>
                        <div style="padding-bottom:5px;">
                            <button type="button" class="btn btn-primary btn-sm" data-url="/cognition/doc/eti/search" style="width:100px;"><span class="glyphicon glyphicon-search" style="padding-right: 10px;"></span><span>Search</span></button>
                        </div>
                    </div>
                </div>
            </div>-->
            <div class="col-xs-6 col-sm-3 col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Latest Documents</div>
                    <div class="panel-body">
                        @isset($latest)
                            @if($latest->count() > 0)
                                @foreach($latest as $doc)
                                    <div style="padding-left: 10px; font-size: 10pt;">
                                        <h4 style="margin-bottom: 0px;"><a class="linkNav" href="/cognition/doc/eti/{{ $doc->id }}">{{ $doc->title }}</a></h4>
                                        <i class="glyphicon glyphicon-user"></i> by {{ $doc->author->first }} {{ $doc->author->last }}
                                        | <i title="{{ $doc->created_at->toDayDateTimeString() }}"><i class="glyphicon glyphicon-calendar""></i> {{ $doc->created_at->diffForHumans() }}</i>
                                        @if(env('COGNITION_COMMENTS') == 'True')| <i class="glyphicon glyphicon-comment"></i> {{ $doc->comments->count() }} Comments @endif
                                        @if(env('COGNITION_TAGS') == 'True')| <i class="glyphicon glyphicon-tags"></i> Tags : @isset($doc->tags) @if($doc->tags->count() > 0) @foreach ($doc->tags as $tag)<a href="#"><span class="label label-default">{{ $tag->name }}</span></a> @endforeach @else None @endif @endisset @empty($doc->tags) None @endempty @endif
                                        <hr style="margin: 10px; margin-left: 0px; border-top: 1px solid #DDD;">
                                    </div>
                                @endforeach
                            @else
                                No documents to show
                            @endif
                        @endisset
                        @empty($latest)
                            No documents to show
                        @endempty
                    </div> 
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Quick Stats</div>
                    <div class="panel-body">
                        <table width="100%">
                            <thead>
                                <td width="80%"></td>
                                <td></td>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-justified text-right" width="80%">CI Docs:</td>
                                    <td class="text-right">{{ $ci_count }}</td>
                                </tr>
                                <tr>
                                    <td class="text-justified text-right" width="80%">ETI Docs:</td>
                                    <td class="text-right">{{ $eti_count }}</td>
                                </tr>
                                <tr style="border-top: 2px solid silver">
                                    <td class="text-justified text-right" width="80%">Total Docs:</td>
                                    <td class="text-right">{{ $doc_count }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@push('scripts')

@endpush

@push('local-css')
    .linkNav:visited, .linkNav:link, .linkNav:active {
        text-decoration: none;
        color: black;
        font-style: italic;
    }
    .groupLink:visited, .groupLink:link, .groupLink:active {
        text-decoration: none;
        color: black;
        font-size: 9pt;
    }
    .linkNav:hover > span {
        color: black;
    }
@endpush

@push('end-scripts')

@endpush

@push('script-libraries')

@endpush