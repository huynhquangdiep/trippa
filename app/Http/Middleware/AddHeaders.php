<?php

namespace App\Http\Middleware;

use Closure;

class AddHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $currentUser = auth()->user();
        $response = $next($request);
        $response->header('Authorization', 'Bearer ' . $currentUser->api_token);
        $response->header('Accept', 'application/json');

        return $response;
    }
}
