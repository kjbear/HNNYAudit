          <dl class="dl-horizontal">
            <dt>DNS Forward</dt>
            <dd>
               {{ $job->results[0]->value }}
               @if ($job->results[0]->result == 'Good')
               &nbsp; <span class="fa fa-check-square-o" style="color: green;"></span>
               @else
               &nbsp; <span class="fa fa fa-times-circle-o" style="color: red;"></span>
               @endif
            </dd>
            <dt>Blues DNS Reverse</dt>
            <dd>
               @if (empty($job->results[1]->value))
               <span style="color: red;">DNS resolution failed</span>
               &nbsp; <span class="fa fa fa-times-circle-o" style="color: red;"></span>
               @else
               {{ $job->results[1]->value }}
               &nbsp; <span class="fa fa-check-square-o" style="color: green;"></span>
               @endif
            </dd>
            <dt>HNNY DNS Reverse</dt>
            <dd>
               @if (empty($job->results[2]->value))
               <span style="color: red;">DNS resolution failed</span>
               &nbsp; <span class="fa fa fa-times-circle-o" style="color: red;"></span>
               @else
               {{ $job->results[2]->value }}
               &nbsp; <span class="fa fa-check-square-o" style="color: green;"></span>
               @endif
            </dd>
          </dl>
          <p>
             {{ $job->type->details }} 
          </p>  
