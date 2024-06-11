<?php

namespace App\Http\Controllers\Override;

use App\Override\Disk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiskController extends Controller
{
    /**
     * Return a JOSN list of disk entities matching
     *  the query paramters
     *
     * @return \Illuminate\Http\Response
     *  JSON
     */

    public function check(Request $request, $host)
    {
   
        $match = NULL;
	// First check to see if there is a direct match for host/path

	$disk = Disk::where('host',$host)
		  ->where('path',$request->input('path'))
		  ->first();

        if (count($disk) == 0) {
		
	    $disk = Disk::where('host',$host)
		      ->whereRaw("path like '|%%' ESCAPE '|'")
		      ->get();
           
	    if (count($disk) > 0) { 
            
		    foreach ($disk as $item) {
        	        $path = substr($item->path,1);
			if (preg_match('/'.$path.'/',$request->input('path')) == 1) {
				$match = $item;
			}
		    }
	    }

        } else {
		$match = $disk;
        }
		
	//  If $match is set, then return JSON data.  If not, then return empty JSON array

        if (is_null($match)) {
	    $got_match = false;
            $ignore = null;
            $warn = null;
            $error = null;
	} else {
        //dd($match);
	    $got_match = true;
            $ignore = $match->ignore;
            $warn = $match->warn;
            $error = $match->error;
	}

	return response()->json([
		'match' => $got_match,
                'ignore' => $ignore,
                'warn' => $warn,
                'error' => $error,
		'raw' => $match
		]
	);

	//dd($match);
        
    }

    public function getHTML($url = "http://monaix/xymon-cgi/svcstatus.sh?HOST=syspr01bvla&SERVICE=disk", $timeout = 20)
    {
       $ch = curl_init($url); // initialize curl with given url
       curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]); // set  useragent
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // write the response to a variable
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // follow redirects if any
       curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout); // max. seconds to execute
       curl_setopt($ch, CURLOPT_FAILONERROR, 1); // stop when it encounters an error

       $res = @curl_exec($ch);
       
       if (strpos($res,"<TD ALIGN=LEFT><H3>Disabled until ") !== false) {
            return "DISABLED";
       } else {
            return "NOT DISABLED";
       }
 
    }


}
