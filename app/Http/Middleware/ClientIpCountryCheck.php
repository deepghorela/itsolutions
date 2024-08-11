<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Torann\GeoIP\Facades\GeoIP;

class ClientIpCountryCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $position = GeoIP::getLocation();
        if($request->has('debug') && $request->debug ='geoip'){
            echo '<pre>';
            print_r($position);
            exit;
        }
        /*
        Sample response data
        Array
        (
            [ip] => 223.190.80.23
            [continent_code] => AS
            [continent_name] => Asia
            [country_code2] => IN
            [country_code3] => IND
            [country_name] => India
            [country_name_official] => Republic of India
            [country_capital] => New Delhi
            [state_prov] => Uttar Pradesh
            [state_code] => IN-UP
            [district] => 
            [city] => Noida
            [zipcode] => 201301
            [latitude] => 28.60522
            [longitude] => 77.35415
            [is_eu] => 
            [calling_code] => +91
            [country_tld] => .in
            [languages] => en-IN,hi,bn,te,mr,ta,ur,gu,kn,ml,or,pa,as,bh,sat,ks,ne,sd,kok,doi,mni,sit,sa,fr,lus,inc
            [country_flag] => https://ipgeolocation.io/static/flags/in_64.png
            [geoname_id] => 10265218
            [isp] => Bharti Airtel Limited
            [connection_type] => 
            [organization] => Bharti Airtel Limited
            [country_emoji] => 🇮🇳
            [currency] => Array
                (
                    [code] => INR
                    [name] => Indian Rupee
                    [symbol] => ₹
                )

            [time_zone] => Array
                (
                    [name] => Asia/Kolkata
                    [offset] => 5.5
                    [offset_with_dst] => 5.5
                    [current_time] => 2024-08-11 11:24:09.419+0530
                    [current_time_unix] => 1723355649.419
                    [is_dst] => 
                    [dst_savings] => 0
                    [dst_exists] => 
                    [dst_start] => 
                    [dst_end] => 
                )

            [default] => 
        )
        */
        if ($position && ($position->country_code2) != 'IN') {
            // Block request
            return response('Access Denied', 403);
        }
        return $next($request);
    }
}
