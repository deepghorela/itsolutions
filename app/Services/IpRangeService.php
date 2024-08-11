<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

/**
 * Whitelist Google Ips
 * 
 */
class IpRangeService
{
    protected $cacheKey = 'google_ip_ranges';
    protected $cacheDuration = 24 * 60; // 24 hours in minutes

    /**
     * Fetch and cache Google IP ranges.
     *
     * @return array
     */
    public function getIpRanges()
    {
        return Cache::remember($this->cacheKey, $this->cacheDuration, function () {
            $response = Http::get('https://www.gstatic.com/ipranges/goog.json');
            
            if ($response->ok()) {
                $data = $response->json();
                return array_merge(
                    $this->convertPrefixes($data['prefixes'] ?? [], 'ipv4Prefix'),
                    $this->convertPrefixes($data['ipv6Prefixes'] ?? [], 'ipv6Prefix')
                );
            }

            return [];
        });
    }

    /**
     * Convert prefixes to a flat array of IP ranges.
     *
     * @param array $prefixes
     * @param string $key
     * @return array
     */
    protected function convertPrefixes(array $prefixes, $key)
    {
        return array_map(function ($prefix) use ($key) {
            return $prefix[$key];
        }, $prefixes);
    }
}
