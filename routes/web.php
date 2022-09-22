<?php

use App\Http\Controllers\FormController;
use App\Http\Middleware\Accesmaster;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Route::group(['Middleware' => 'auth'], function () {
    Route::resource('/forms', FormController::class);
});

Auth::routes();

Route::get('forms-export', [FormController::class, 'export'])->name('excel');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
