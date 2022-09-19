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
// Route::get('/register', function () {
//     return view('auth.register');
// })->middleware(Accesmaster::class);

Auth::routes();

Route::get('forms-export', [FormController::class, 'export'])->name('excel');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login');

// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
// Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
// Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

