<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class IpRangeService
{
    protected $cacheKey = 'google_ip_ranges';
    protected $cacheDuration = 1440; // 24 hours in minutes

    /**
     * Get the IP ranges from the cache or fetch from the source.
     *
     * @return array
     */
    public function getIpRanges()
    {
        // Check if the IP ranges are already cached
        if (Cache::has($this->cacheKey)) {
            return Cache::get($this->cacheKey);
        }

        // Fetch IP ranges from the remote source
        $response = Http::get('https://www.gstatic.com/ipranges/goog.json');
        $data = $response->json();

        // Convert and cache the IP ranges
        $ipRanges = $this->convertPrefixes($data['prefixes'] ?? []);
        Cache::put($this->cacheKey, $ipRanges, $this->cacheDuration);

        return $ipRanges;
    }

    /**
     * Convert IP prefixes to a simple array of IP ranges.
     *
     * @param array $prefixes
     * @return array
     */
    protected function convertPrefixes(array $prefixes)
    {
        $ranges = [];

        foreach ($prefixes as $prefix) {
            // Check for both IPv4 and IPv6 prefixes
            if (isset($prefix['ipv4Prefix'])) {
                $ranges[] = $prefix['ipv4Prefix'];
            } elseif (isset($prefix['ipv6Prefix'])) {
                $ranges[] = $prefix['ipv6Prefix'];
            }
        }

        return $ranges;
    }
}
