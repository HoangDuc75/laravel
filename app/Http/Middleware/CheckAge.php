<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // return $next($request);
        $age = $request->input('age');

        if (is_numeric($age) && $age >= 18) {
            return $next($request);
        } else {
            return response()->json([
                'message' => 'Không được phép truy cập!',
            ], 403);
        }
    }
}