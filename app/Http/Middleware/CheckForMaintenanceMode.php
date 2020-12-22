<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;

final class CheckForMaintenanceMode extends Middleware
{
    /** @var array */
    protected $except = [
        //
    ];
}
