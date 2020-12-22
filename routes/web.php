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

Route::get('/home', 'HomeController');

Route::get('/session/{message}', 'TestController@session');
Route::get('/fire-event', 'TestController@fireEvent');
Route::get('/test-value', 'TestController@testValue')->name('test-value');
Route::get('/service-container',  function () {
    return view('utils/service-container');
});