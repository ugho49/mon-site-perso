<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HeaderMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        return $next($request)->header('Access-Control-Allow-Origin', '*');
    }
}
