          <dl class="dl-horizontal">
            <dt>Host Name</dt>
            <dd>
               {{ $ci->name }}
               @if ($job->results[0]->result == 'Good')
               &nbsp; <span class="fa fa-check-square-o" style="color: green;"></span>
               @else
               &nbsp; <span class="fa fa fa-times-circle-o" style="color: red;"></span>
               @endif
            </dd>
            <dt>FQDN</dt>
            <dd>
               {{ $ci->HNNY_FQDN }}
               @if ($job->results[1]->result == 'Good')
               &nbsp; <span class="fa fa-check-square-o" style="color: green;"></span>
               @else
               &nbsp; <span class="fa fa fa-times-circle-o" style="color: red;"></span>
               @endif
            </dd>
            <dt>Monitoring Tier</dt>
            <dd>
               @if (empty($job->results[2]->value))
               <span style="color: red;">Monitoring has not been setup (Monitoring Tier is NULL)</span>
               &nbsp; <span class="fa fa fa-times-circle-o" style="color: red;"></span>
               @elseif($ci->monitoring_tier == 'None')
               Monitoring Disabled 
               &nbsp; <span class="fa fa-exclamation-triangle" style="color: yellow;"></span>
               @else
               {{ $ci->monitoring_tier }}
               &nbsp; <span class="fa fa-check-square-o" style="color: green;"></span>
               @endif
            </dd>
            @isset($job->results[3])
            <dt>Device Type</dt>
            <dd>
               @if (empty($job->results[3]->value))
               <span style="color: red;">Monitoring has not been setup (Device Type is NULL)</span>
               &nbsp; <span class="fa fa fa-times-circle-o" style="color: red;"></span>
               @else
               {{ $job->results[3]->value }}
               &nbsp; <span class="fa fa-check-square-o" style="color: green;"></span>
               @endif
            </dd>
            @endisset
            <dt>OMI Agent Deployed</dt>
            <dd>
              @if ($ci->host_osinstalltype == 0)
              No
              @else
              Yes
              @endif
            </dd>
          </dl>
          <p>
            In order for monitoring of this CI to be enabled, a number of conditions must be met.  The CI must be discovered
            by the Universal CMDB, and then sent over to RTSM module in Ops Bridge.  Once there, the CI is identified by
            environment, and if applicable, monitors are deployed to HP SiteScope (or others).<br>
            This test ensures that all of the requirements are met for a device to be monitored properly.
          </p>  
