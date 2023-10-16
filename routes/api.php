<?php

declare(strict_types=1);

use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// API Routes

Route::middleware('auth:api')->get('/user',
    fn(Request $request) => $request->user()
);

Route::get('/ping', fn(Request $request) => 'pong');
Route::post('/upload-files', [TestController::class, 'uploadFiles']);
