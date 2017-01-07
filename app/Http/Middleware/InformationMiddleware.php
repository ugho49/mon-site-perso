<?php

namespace App\Http\Middleware;

use App\Models\Information;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InformationMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $informations = Information::all();

        foreach ($informations as $info) {
            $key = 'info_' . $info->key;
            // Set informations to sessions
            if (Session::has($key)) {
                Session::remove($key);
            }
            Session::set($key, $info->value != "" ? $info->value : $info->value_locale);
        }

        return $next($request);
    }
}
