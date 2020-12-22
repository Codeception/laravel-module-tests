<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AbstractController;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

final class ResetPasswordController extends AbstractController
{
    use ResetsPasswords;

    /** @var string */
    protected $redirectTo = RouteServiceProvider::HOME;
}
