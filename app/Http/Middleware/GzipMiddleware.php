<?php

namespace App\Http\Middleware;

use Closure;

class GzipMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ($response->isSuccessful() && $response->statusText()) {
            $content = gzencode($response->getContent(), 9);

            $response->header('Content-Encoding', 'gzip');
            $response->header('Content-Length', strlen($content));
            $response->setContent($content);
        }

        return $response;
    }
}
