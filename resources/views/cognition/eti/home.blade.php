@extends('cognition.eti.index')

@push('local-css')
    .link {
            cursor: pointer;
        }
        .hover {
            background-color: #eee;
        }

        .selected {
            background-color: #eee;
            font-weight: bold;
        }

        .link > span {
            font-size: 10pt;
        }

        .panel-title > a {
            font-size: 10pt;
        }

        .panel-title {
            font-size: 10pt;
        }

@endpush

@section('content')
    <div class="container-fluid">

        <div style="padding-top:20px"></div>
        <div class="row">
            <div class="col-md-2">
                @include('cognition.eti.nav')
            </div>
            <div class="col-md-10">
                <h4>
                    <img src="/assets/img/cog-icon2.png" height="50px;">
                    Cognition Document Management System
                    <img class="pull-right" src="/assets/img/logo_main.png" alt="HealthNow New York" height="40px;" style="padding-top:10px;">  &nbsp;&nbsp;&nbsp;&nbsp;
                </h4>
                <hr>
                <!--<span class="pull-right"><img src="/assets/img/logo_main.png" alt="HealthNow New York" width="250px;" height="50px;"></span>-->
                @yield('subcontent')
            </div>
        </div>
    </div>


@endsection

@push('scripts')

@endpush

@push('local-css')

@endpush

@push('end-scripts')


    $(".link").hover(
        function() {
            $(this).addClass('hover');
        }, function() {
            $(this).removeClass('hover');
        }
    );

    $(".link").click(
        function() {
            url = $(this).data('url');
            document.location.href=url;
        }
    )

@endpush

@push('script-libraries')

@endpush