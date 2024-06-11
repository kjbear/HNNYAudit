@extends('dashboard-vertical.index')

@section('title', 'EMS - Configuration Item Explorer')

@section('main')
<div class="page-header"><h1>Configuration Item Explorer</h1></div>
<!--<div class="panel panel-default">
  <div class="panel-body">
    The Configuration Item Explorer allows you to view data that has been cached from the RTSM database.  This information is synchronized on a periodic basis.
  </div>
</div>-->
<div id="loading" style="visibility: visible">
<span class="spinner spinner-lg spinner-inline"></span>  Please wait - data loading....
</div>
   <table id="cis" class="display table table-striped table-bordered" style="visibility: hidden;" cellspacing="0">
     <thead>
        <tr>
           <th>Name</th>
           <th>Type</th>
           <th>Monitoring Tier</th>
           <th>Actions</th>
        </tr>
     </thead> 
     <tfoot>
        <tr>
           <th>Name</th>
           <th>Type</th>
           <th>Monitoring Tier</th>
           <th>Actions</th>
        </tr>
     </tfoot> 
     <tbody>
@foreach($configItems as $ci)
  @if (!is_null($ci->display_label) && !($ci->display_label == ""))
        <tr>
           <td><a href="/configItem/{{ $ci->id }}">{{ $ci->display_label }}</a></td>
           <td>{{ $ci->type_label }}</td>
           <td>{{ $ci->monitoring_tier }}</td>
           <td><button class='btn btn-primary' type='button'><span class='fa fa-balance-scale' data-toggle='tooltip' title='Audit'></span> Audit</button></td>
        </tr>
  @endif
@endforeach
     </tbody>
   </table>
<p><br><br><br></p>


@endsection

@push('end-scripts')
   
   //  Set the active nav panel
   $('#nav-ciexplorer').addClass('active');

   //  Initialize the data table

   $(document).ready(function() {
    $('#cis').DataTable( {
       lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
       iDisplayLength: 10,
       select: {
            style: 'multi'
       }
    } );
    $('#loading').css('visibility','hidden');
    $('#cis').css('visibility','visible');
} );
@endpush
