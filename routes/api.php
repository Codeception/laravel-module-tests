<?php

declare(strict_types=1);

use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// API Routes

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/upload-files', [TestController::class, 'uploadFiles']);
