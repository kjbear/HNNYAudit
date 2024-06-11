<?php

namespace App;

//use App\Monitor;

//class SiteScopeMonitor extends Monitor

class SiteScopeMonitor extends Monitor
{

    public $ci;
    public $type;
    public $name;
    public $active;

    public $status;
    public $status_summary;
    public $status_availability;
    public $status_description;

    public $raw;

    function __construct($json)
    {
        $this->raw  = $json;  

        $cs = (empty($json['configuration_snapshot'])) ? null : $json['configuration_snapshot'];
        $rs = (empty($json['runtime_snapshot'])) ? null : $json['runtime_snapshot'];

        if (!empty($cs) && !empty($rs)) { 
 
            $this->ci     = $cs['target_name'];
            $this->type   = $cs['type'];
            $this->name   = $cs['name'];
            $this->active = (empty($cs['disable_start_time'])) ? true : false;
 
            $this->status               = $rs['status'];
            $this->status_summary       = $rs['summary'];
            $this->status_availability  = $rs['availability'];
            $this->status_description   = $rs['availability_description'];
        }
    }


}
