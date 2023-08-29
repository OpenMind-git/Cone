<?php

namespace Erjon\Cone\App\Http\Middleware;

use Erjon\Cone\App\Repositories\KeyRepository;
use Illuminate\Http\Request;
use Closure;

class NotLicensedMiddleware
{
    private $keyRepository;

    public function __construct(KeyRepository $keyRepository)
    {
        $this->keyRepository = $keyRepository;
    }

    public function handle(Request $request, Closure $next)
    {
        $key = $this->keyRepository->getUserActiveKey();

        if (! $key) {
            \App::setLocale(\Session::get('license-language', 'en'));

            return $next($request);
        }

        return redirect()->route(config('cone.route-after-license'));
    }
}
