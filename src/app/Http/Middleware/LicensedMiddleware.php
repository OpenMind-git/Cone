<?php

namespace Erjon\Cone\App\Http\Middleware;

use Erjon\Cone\Cone;
use Illuminate\Http\Request;
use Closure;

class LicensedMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if (! (new Cone)->check(\Auth::user()->email)) {
            return redirect()->route('show-license-form');
        }

        if($request->route()->getName() == 'show-license-form' || $request->route()->getName() == 'activate-license') {
            return redirect()->route(config('cone.route-after-license'));
        }

        return $next($request);
    }
}
