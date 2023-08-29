<?php

namespace Erjon\Cone;

use Erjon\Cone\App\Http\Middleware\LicensedMiddleware;
use Erjon\Cone\App\Http\Middleware\NotLicensedMiddleware;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class ConeServiceProvider extends ServiceProvider
{
    public function boot(Router $router)
    {
        $this->loadViewsFrom(__DIR__.'/../src/resources/views', 'cone');
        $this->loadRoutesFrom(__DIR__ . '/../src/routes/web.php');
        $this->loadTranslationsFrom(__DIR__ . '/../src/resources/lang', 'cone');

        $router->middlewareGroup('licensed', [LicensedMiddleware::class]);
        $router->middlewareGroup('not-licensed', [NotLicensedMiddleware::class]);

        $this->publishes([
            __DIR__ . '/../src/config/cone.php' => config_path('cone.php'),
            __DIR__ . '/../src/public' => public_path('vendor/cone'),
            __DIR__ . '/../src/resources/lang' => resource_path('lang/vendor/cone')
        ], 'cone');
    }

    public function register()
    {
        $this->app->singleton(Cone::class, function () {
            return new Cone();
        });
    }
}
