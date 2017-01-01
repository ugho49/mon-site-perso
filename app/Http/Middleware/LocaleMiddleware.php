<?php

namespace App\Http\Middleware;

use App\Models\Translation;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Response;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $localesAvailables = Translation::all('locale');
        $localeParam = $request->segment(2);

        if ( $localesAvailables->contains('locale', $localeParam) ) {
            App::setLocale($localeParam);
        } else {
            return Response::json(['error' => true, 'message' => 'locale not found'], 404);
        }

        return $next($request);
    }
}
