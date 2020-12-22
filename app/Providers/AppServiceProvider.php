<?php

declare(strict_types=1);

namespace App\Providers;

use App\Utils\Contracts\StringConverterInterface;
use App\Utils\Repeat;
use App\Utils\ToLowercase;
use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Contracts\View\Factory as View;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $view = app()->get(View::class);
        $view->share('app_name', env('APP_NAME'));

        $config = app()->get(Config::class);
        $config->set('test_value', 5);
    }

    public function boot(): void
    {
        app()->bind(StringConverterInterface::class, ToLowercase::class);
        app()->addContextualBinding(Repeat::class, '$times', 3);
    }
}
