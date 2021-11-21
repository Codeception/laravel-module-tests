<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use function base_path;

final class RouteServiceProvider extends ServiceProvider
{
    /** @var string */
    public const HOME = '/';

    /** @var string */
    protected $namespace = 'App\Http\Controllers';

    public function map(): void
    {
        $router = app()->get(Router::class);
        $router->prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));

        $router->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }
}
