<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Jobs\SampleJob;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class ApiAfter
{
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }

    public function terminate(Request $request, Response $response): void
    {
        dispatch(new SampleJob());
    }
}