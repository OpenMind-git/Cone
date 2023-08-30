<?php

namespace Erjon\Cone\App\Http\Middleware;

use Erjon\Cone\App\Models\Key;
use Erjon\Cone\App\Repositories\KeyRepository;
use Illuminate\Http\Request;
use Closure;

class LicensedMiddleware
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
            return redirect()->route('show-license-form');
        }

        $this->keyRepository->keyUsed($key);

        if($request->route()->getName() == 'show-license-form' || $request->route()->getName() == 'activate-license') {
            return redirect()->route(config('cone.route-after-license'));
        }

        return $next($request);
    }
}
