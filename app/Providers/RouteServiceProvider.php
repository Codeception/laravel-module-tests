<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Cache\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use function base_path;
use function optional;

final class RouteServiceProvider extends ServiceProvider
{
    /** @var string */
    public const HOME = '/';

    /** @var string */
    // protected $namespace = 'App\\Http\\Controllers';

    public function boot(): void
    {
        $this->configureRateLimiting();

        $router = app()->get(Router::class);
        $this->routes(function() use ($router): void {
            $router->prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            $router->middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });
    }

    protected function configureRateLimiting(): void
    {
        $rateLimiter = app()->get(RateLimiter::class);
        $rateLimiter->for('api', fn(Request $request): Limit => Limit::perMinute(60)->by(
            (string) optional($request->user())->id ?: $request->ip()
        ));
    }
}
