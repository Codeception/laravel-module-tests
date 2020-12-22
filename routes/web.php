<?php

declare(strict_types=1);

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Web Routes

Route::get('/', function () {
    return view('welcome');
})->name('index');

Auth::routes();

Route::get('/home', HomeController::class);

Route::get('/session/{message}', [TestController::class, 'session']);
Route::get('/fire-event', [TestController::class, 'fireEvent']);
Route::get('/test-value', [TestController::class, 'testValue'])->name('test-value');
Route::get('/service-container',  function () {
    return view('utils/service-container');
});