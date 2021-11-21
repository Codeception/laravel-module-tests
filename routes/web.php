<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Web Routes

Route::get('/',
    fn() => view('welcome')
)->name('index');

Auth::routes();

Route::get('/home', 'HomeController');

Route::get('/fire-event', 'TestController@fireEvent');
Route::get('/test-value', 'TestController@testValue')->name('test-value');
Route::get('/service-container',
    fn() => view('utils/service-container')
);