<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class RequestLoggerMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Log request details
        Log::info('Request', [
            'ip' => $request->ip(),
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'parameters' => $request->all(),
        ]);

        // Log response details
        Log::info('Response', [
            'status_code' => $response->status(),
            'content' => $response->getContent(),
        ]);

        return $response;
    }
}
