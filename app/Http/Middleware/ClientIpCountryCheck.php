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

        if ($position && strtolower($position->country) != 'india') {
            // Block request
            return response('Access Denied', 403);
        }
        return $next($request);
    }
}
