@extends('dashboard-vertical.index')

@section('main')

    <div class="page-header"><h1>Configuration Item '{{ $ci->display_label }}'<h1></div>
        <div class="well">
            <div class="row">
                <div class="col-md-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Details
                        </div>
                        <div class="panel-body">
 			    <table class="table table-hover table-bordered">
                               <thead>
                               </thead>
                               <tbody>
                                  <tr>
                                      <td style="width:30%;">Name</td>
                                      <td>{{ $ci->name }}</td>
                                  </tr>
                                  <tr>
                                      <td style="width:30%;">RTSM Global ID</td>
                                      <td>{{ $ci->global_id }}</td>
                                  </tr>
                                  <tr>
                                      <td style="width:30%;">Display Name</td>
                                      <td>{{ $ci->display_label }}</td>
                                  </tr>
                                  <tr>
                                      <td style="width:30%;">Host OS</td>
                                      <td>{{ $ci->discovered_os_name }} - {{ $ci->host_osinstalltype }}</td>
                                  </tr>
                                  <tr>
                                      <td style="width:30%;">Device Model</td>
                                      <td>{{ $ci->discovered_model }}</td>
                                  </tr>
                               </tbody>
			    </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Actions
                        </div>
                        <div class="panel-body">
                            <button class="btn btn-primary" type="button"><span class="fa fa-balance-scale"></span> Audit Device</button>
			    <br><br>
                            <button class="btn btn-primary" type="button"><span class="fa fa-list"></span> View Events for Device</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Monitoring Standards Health
                </div>
                <div class="panel-body">
                    @isset($ci->latestAudit)
                    <div>As of {{ Carbon\Carbon::parse($ci->latestAudit->created_at)->format('m-d-y h:i A') }}</div>
                        <div class="list-group list-view-pf list-view-pf-view">
                            @if (!is_null($ci->latestAudit->statusJob) and !empty($ci->latestAudit->statusJob))
                                @include('partials.statusline',['job' => $ci->latestAudit->statusJob])
                            @else
                            No Status result
                            @endif
                            @foreach ($ci->latestAudit->jobs as $job)
                                @include('partials.statusline')
                            @endforeach
                            @isset($ci->latestAudit->siteScopeJob)
                                @include('partials.statusline',['job' => $ci->latestAudit->siteScopeJob])
                            @endisset
                        </div>
                    @else
                       No health audit records found for this Configuration Item
                    @endisset

                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Deployed Monitors
                </div>
                <div class="panel-body">
                </div>
            </div>
        </div>
    </div>


@endsection

@push('end-scripts')
 $(document).ready(function () {
    // Row Checkbox Selection
    $("input[type='checkbox']").change(function (e) {
      if ($(this).is(":checked")) {
        $(this).closest('.list-group-item').addClass("active");
      } else {
        $(this).closest('.list-group-item').removeClass("active");
      }
    });
    // toggle dropdown menu
    $('.list-view-pf-actions').on('show.bs.dropdown', function () {
      var $this = $(this);
      var $dropdown = $this.find('.dropdown');
      var space = $(window).height() - $dropdown[0].getBoundingClientRect().top - $this.find('.dropdown-menu').outerHeight(true);
      $dropdown.toggleClass('dropup', space < 10);
    });

    // click the list-view heading then expand a row
    $(".list-group-item-header").click(function(event){
      if(!$(event.target).is("button, a, input, .fa-ellipsis-v")){
        $(this).find(".fa-angle-right").toggleClass("fa-angle-down")
          .end().parent().toggleClass("list-view-pf-expand-active")
            .find(".list-group-item-container").toggleClass("hidden");
      } else {
      }
    });

    // click the close button, hide the expand row and remove the active status
    $(".list-group-item-container .close").on("click", function (){
      $(this).parent().addClass("hidden")
        .parent().removeClass("list-view-pf-expand-active")
          .find(".fa-angle-right").removeClass("fa-angle-down");
    })
   });
@endpush
