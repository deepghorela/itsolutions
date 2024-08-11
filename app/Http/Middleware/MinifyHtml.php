<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MinifyHtml
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Only minify HTML responses
        if ($response->headers->get('Content-Type') === 'text/html; charset=UTF-8') {
            $output = $response->getContent();

            // Minify HTML
            $output = preg_replace('/<!--(?!<!)[^\[>].*?-->/', '', $output); // Remove HTML comments except IE conditional comments
            $output = preg_replace('/\s+/', ' ', $output); // Replace multiple whitespace with a single space
            $output = preg_replace('/>\s+</', '><', $output); // Remove spaces between HTML tags

            $response->setContent($output);
        }

        return $response;
    }
}
