<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AbstractController;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

final class ForgotPasswordController extends AbstractController
{
    use SendsPasswordResetEmails;
}
