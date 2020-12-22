<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector as Redirect;
use Symfony\Component\HttpFoundation\Response;

final class RedirectIfAuthenticated
{
    /**
     * @param Request $request
     * @param Closure $next
     * @param string|null $guard
     * @return Response
     */
    public function handle(Request $request, Closure $next, $guard = null): Response
    {
        $auth = app()->get(Auth::class);
        $redirect = app()->get(Redirect::class);
        if ($auth->guard($guard)->check()) {
            return $redirect->to(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
