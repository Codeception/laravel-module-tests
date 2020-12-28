<?php

declare(strict_types=1);

namespace App\Providers;

use App\Repository\Eloquent\UserRepository;
use App\Repository\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

final class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        app()->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
