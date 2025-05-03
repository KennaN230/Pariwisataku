<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CSRF
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Mengecek apakah permintaan POST mengandung CSRF token yang valid
        if ($request->method() === 'POST' && !$request->has('_token')) {
            // Menangani kasus jika token CSRF tidak ada dalam permintaan POST
            return response()->json(['message' => 'CSRF token missing.'], 419);
        }

        // Jika token ada dan valid, lanjutkan ke request berikutnya
        return $next($request);
    }
}
