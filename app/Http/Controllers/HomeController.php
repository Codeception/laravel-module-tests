<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory as View;
use Illuminate\Http\Request;

final class HomeController extends AbstractController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request): Renderable
    {
        $view = app()->get(View::class);
        return $view->make('home');
    }
}
