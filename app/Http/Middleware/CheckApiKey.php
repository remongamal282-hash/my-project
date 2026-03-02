<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckApiKey
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $providedApiKey = (string) $request->header('x-api-key', '');
        $expectedApiKey = (string) env('API_KEY', '');

        if ($providedApiKey === '' || $expectedApiKey === '' || ! hash_equals($expectedApiKey, $providedApiKey)) {
            return response()->json([
                'message' => 'Unauthorized: invalid API key.',
            ], 401);
        }

        return $next($request);
    }
}
