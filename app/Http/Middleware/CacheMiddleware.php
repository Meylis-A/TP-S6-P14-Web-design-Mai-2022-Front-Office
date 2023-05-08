<?php

namespace App\Http\Middleware;

use Closure;

class CacheMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Vérifiez si la requête concerne une ressource statique
        if ($response->isSuccessful() && $response->isFile()) {
            $maxAge = 86400; // Durée maximale de mise en cache en secondes (ici, 1 jour)
            
            $response->header('Cache-Control', 'public, max-age=' . $maxAge);
            $response->setExpires(now()->addSeconds($maxAge));
        }

        return $response;
    }
}
