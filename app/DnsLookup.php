<?php

namespace App;

use App\Base;
use Illuminate\Support\Facades\Log;
use Exception;

class DnsLookup extends Base
{

   function getIPFromFQDN($host)
   {
       try {
           return trim(`/usr/bin/dig $host. A +short | /usr/bin/tail -n1`);
       } catch(Exception $e) {
           Log::warning("DNS Forward Lookup failed for '".$host."':  ".$e->getMessage());
           return null;
       }
   }

   function getFQDNFromIP($ip, $dnsServer = '10.19.3.6')
   {
       try {
           //$ip =  gethostbyaddr($ip);
           return trim(`/usr/bin/dig +noall +answer @$dnsServer -x $ip +short`);
       } catch(Exception $e) {
           Log::warning("DNS Reverse Lookup failed for '".$ip."':  ".$e->getMessage());
           return null;
       }
   }

}
