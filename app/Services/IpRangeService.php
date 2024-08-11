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
        // return Cache::remember('google_ip_ranges', self::CACHE_DURATION, function () {
        //     $response = Http::get(self::IP_RANGES_URL);

        //     if ($response->failed()) {
        //         throw new \Exception('Failed to fetch IP ranges from Google.');
        //     }

        //     $data = $response->json();
        //     $ranges = [];

        //     // Extract IPv4 and IPv6 prefixes from the JSON data
        //     foreach (array_merge($data['prefixes'] ?? [], $data['ipv6Prefixes'] ?? []) as $prefix) {
        //         $ranges[] = $prefix['ipv4Prefix'] ?? $prefix['ipv6Prefix'];
        //     }

        //     return $ranges;
        // });

        return array(
            "8.8.4.0/24",
            "8.8.8.0/24",
            "8.34.208.0/20",
            "8.35.192.0/20",
            "23.236.48.0/20",
            "23.251.128.0/19",
            "34.0.0.0/15",
            "34.2.0.0/16",
            "34.3.0.0/23",
            "34.3.3.0/24",
            "34.3.4.0/24",
            "34.3.8.0/21",
            "34.3.16.0/20",
            "34.3.32.0/19",
            "34.3.64.0/18",
            "34.4.0.0/14",
            "34.8.0.0/13",
            "34.16.0.0/12",
            "34.32.0.0/11",
            "34.64.0.0/10",
            "34.128.0.0/10",
            "35.184.0.0/13",
            "35.192.0.0/14",
            "35.196.0.0/15",
            "35.198.0.0/16",
            "35.199.0.0/17",
            "35.199.128.0/18",
            "35.200.0.0/13",
            "35.208.0.0/12",
            "35.224.0.0/12",
            "35.240.0.0/13",
            "57.140.192.0/18",
            "64.15.112.0/20",
            "64.233.160.0/19",
            "66.22.228.0/23",
            "66.102.0.0/20",
            "66.249.64.0/19",
            "66.249.82.0/19",
            "70.32.128.0/19",
            "72.14.192.0/18",
            "74.125.0.0/16",
            "104.154.0.0/15",
            "104.196.0.0/14",
            "104.237.160.0/19",
            "107.167.160.0/19",
            "107.178.192.0/18",
            "108.59.80.0/20",
            "108.170.192.0/18",
            "108.177.0.0/17",
            "130.211.0.0/16",
            "136.22.160.0/20",
            "136.22.176.0/21",
            "136.22.184.0/23",
            "136.22.186.0/24",
            "142.250.0.0/15",
            "146.148.0.0/17",
            "152.65.208.0/22",
            "152.65.214.0/23",
            "152.65.218.0/23",
            "152.65.222.0/23",
            "152.65.224.0/19",
            "162.120.128.0/17",
            "162.216.148.0/22",
            "162.222.176.0/21",
            "172.110.32.0/21",
            "172.217.0.0/16",
            "172.253.0.0/16",
            "173.194.0.0/16",
            "173.255.112.0/20",
            "192.158.28.0/22",
            "192.178.0.0/15",
            "193.186.4.0/24",
            "199.36.154.0/23",
            "199.36.156.0/24",
            "199.192.112.0/22",
            "199.223.232.0/21",
            "207.223.160.0/20",
            "208.65.152.0/22",
            "208.68.108.0/22",
            "208.81.188.0/22",
            "208.117.224.0/19",
            "209.85.128.0/17",
            "216.58.192.0/19",
            "216.73.80.0/20",
            "216.239.32.0/19",
            "2001:4860::/32",
            "2404:6800::/32",
            "2404:f340::/32",
            "2600:1900::/28",
            "2605:ef80::/32",
            "2606:40::/32",
            "2606:73c0::/32",
            "2607:f8b0::/32",
            "2620:11a:a000::/40",
            "2620:120:e000::/40",
            "2800:3f0::/32",
            "2a00:1450::/32",
            "2c0f:fb50::/32"
        );
    }

    /**
     * Checks if an IP address is within a specific CIDR range.
     *
     * @param string $ip The IP address to check.
     * @param string $cidr The CIDR notation for the range.
     * @return bool True if the IP is within the range, otherwise false.
     */
    protected function ipInRange($ip, $cidr)
    {
        if (strpos($cidr, ':') !== false) {
            // Handle IPv6
            return $this->ipv6InRange($ip, $cidr);
        } else {
            return $this->ipv4InRange($ip, $cidr);
        }
    }

    protected function ipv6InRange($ip, $cidr)
    {
        list($subnet, $mask) = explode('/', $cidr);
        $subnet = inet_pton($subnet);
        $ip = inet_pton($ip);

        $mask = str_repeat('f', $mask / 4) . str_repeat('0', 32 - ($mask / 4));
        $mask = pack('H*', $mask);

        return (strncmp($ip & $mask, $subnet & $mask, strlen($mask)) === 0);
    }


    protected function ipv4InRange($ip, $cidr)
    {
        list($subnet, $mask) = explode('/', $cidr);
        $subnet = ip2long($subnet);
        $mask = intval($mask);

        $ip = ip2long($ip);
        $mask = -1 << (32 - $mask);

        return (($ip & $mask) == ($subnet & $mask));
    }
}
