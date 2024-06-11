          <dl class="dl-horizontal">
            @isset($job->results)
            @foreach($job->results as $result)
            <dt>{{ $result->name }}</dt>
            <dd>
               @if ($result->result == 'Good')
               Passed &nbsp; <span class="fa fa-check-square-o" style="color: green;"></span>
               @else
               Failed &nbsp; <span class="fa fa fa-times-circle-o" style="color: red;"></span>
               @endif
            </dd>
            @endforeach
            @endisset
          </dl>
          <p>
          {{ $job->type->details }}
          </p>  
