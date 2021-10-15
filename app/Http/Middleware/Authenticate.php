<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Http\Request;

final class Authenticate extends Middleware
{
    /** @param Request $request */
    protected function redirectTo($request): ?string
    {
        $urlGenerator = app()->get(UrlGenerator::class);
        if (! $request->expectsJson()) {
            $urlGenerator->route('login');
        }

        return null;
    }
}
