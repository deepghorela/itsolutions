<?php

namespace App\Services;

use InvalidArgumentException;
use Spatie\IpTools\IpRange;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class IpRangeService
{
    /**
     * The URL to fetch the IP range data from.
     */
    private const IP_RANGES_URL = 'https://www.gstatic.com/ipranges/goog.json';

    /**
     * Cache duration in minutes.
     */
    private const CACHE_DURATION = 1440; // 24 hours

    /**
     * Checks if an IP address is within any of the Google IP ranges.
     *
     * @param string $ip The IP address to check.
     * @return bool True if the IP is within any range, otherwise false.
     */
    public function isIpInGoogleRange($ip)
    {
        if (!filter_var($ip, FILTER_VALIDATE_IP)) {
            throw new InvalidArgumentException('Invalid IP address provided.');
        }

        // Fetch and parse the IP ranges
        $ranges = $this->getGoogleIpRanges();

        // Check if the IP is within any of the ranges
        foreach ($ranges as $range) {
            if ($this->ipInRange($ip, $range)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Fetches and caches Google IP ranges.
     *
     * @return array The IP ranges in CIDR notation.
     */
    private function getGoogleIpRanges()
    {
        return Cache::remember('google_ip_ranges', self::CACHE_DURATION, function () {
            $response = Http::get(self::IP_RANGES_URL);

            if ($response->failed()) {
                throw new \Exception('Failed to fetch IP ranges from Google.');
            }

            $data = $response->json();
            $ranges = [];

            // Extract IPv4 and IPv6 prefixes from the JSON data
            foreach (array_merge($data['prefixes'] ?? [], $data['ipv6Prefixes'] ?? []) as $prefix) {
                $ranges[] = $prefix['ipv4Prefix'] ?? $prefix['ipv6Prefix'];
            }

            return $ranges;
        });
    }

    /**
     * Checks if an IP address is within a specific CIDR range.
     *
     * @param string $ip The IP address to check.
     * @param string $cidr The CIDR notation for the range.
     * @return bool True if the IP is within the range, otherwise false.
     */
    protected function ipInRange($ip, $cidr) {
        if (strpos($cidr, ':') !== false) {
            // Handle IPv6
            return $this->ipv6InRange($ip, $cidr);
        } else {
            return $this->ipv4InRange($ip, $cidr);
        }
    }

    protected function ipv6InRange($ip, $cidr) {
        list($subnet, $mask) = explode('/', $cidr);
        $subnet = inet_pton($subnet);
        $ip = inet_pton($ip);
    
        $mask = str_repeat('f', $mask / 4) . str_repeat('0', 32 - ($mask / 4));
        $mask = pack('H*', $mask);
    
        return (strncmp($ip & $mask, $subnet & $mask, strlen($mask)) === 0);
    }


    protected function ipv4InRange($ip, $cidr) {
        list($subnet, $mask) = explode('/', $cidr);
        $subnet = ip2long($subnet);
        $mask = intval($mask);

        $ip = ip2long($ip);
        $mask = -1 << (32 - $mask);

        return (($ip & $mask) == ($subnet & $mask));
    }
}
