          <dl class="dl-horizontal">
            <dt>ICMP Ping Response</dt>
            <dd>
               @if (is_null($job->results[0]->value))
               <span style="color: red;">Device is not responding to ping ({{ $job->results[0]->id }})</span>
               &nbsp; <span class="fa fa fa-times-circle-o" style="color: red;"></span>
               @else
               {{ $job->results[0]->value }} ms latency
               &nbsp; <span class="fa fa-check-square-o" style="color: green;"></span>
               @endif
            </dd>
          </dl>
          <p>
             {{ $job->type->details }} 
          </p>  
