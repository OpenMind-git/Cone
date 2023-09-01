<?php

namespace Erjon\Cone\App\Http\Middleware;

use Erjon\Cone\Cone;
use Illuminate\Http\Request;
use Closure;

class NotLicensedMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if (!(new Cone)->check(\Auth::user()->email)) {
            \App::setLocale(\Session::get('license-language', 'en'));

            return $next($request);
        }

        return redirect()->route(config('cone.route-after-license'));
    }
}
