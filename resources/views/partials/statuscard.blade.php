<div class="row row-cards-pf">
    <div class="col-sm-2 col-md-2">
        @if ($job->statusSummary() == 'Good')
        <div class="panel panel-success" style="min-width: 350px;">
        @else
        <div class="panel panel-danger" style="min-width: 350px;">
        @endif
            <div class="panel-heading" data-toggle="collapse" href="#job{{ $job->id }}">
{{ $job->type->name }}
                <span class="badge" style="float: right;">{{ $job->goodCount() }}/{{ $job->results->count() }}</span>
               </div>
            <div class="panel-body collapse" id="job{{ $job->id }}">
               @foreach ($job->results as $result)
               <span style="float: left; text-decoration: underline;">{{ $result->name }}:</span>
               @if ($result->result == 'Good')
               <span class="pficon pficon-ok pull-right"></span>
               @else
               <span class="pficon pficon-error-circle-o pull-right"></span>
               @endif
               <span style="float: right;">{{ $result->value }}&nbsp;</span>
               <br>
               @endforeach
               <span style="float: right;"><div class="btn-group" style="float: rigth;">
                   <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Action <span class="caret"></span>
                   </button>
                   <ul class="dropdown-menu">
                       <li><a href="#">History</a></li>
                       <li><a href="#">Recheck</a></li>
                   </ul>
               </div></span>
            </div>
        </div>
    </div>
</div>
