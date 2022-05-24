<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\RegistrationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/', 'HomeController@index')->name('index');

Route::get('/about', 'HomeController@about')->name('about');

Route::get('/catalogo', 'HomeController@catalogo')->name('catalogo');

Route::get('/testimonial', 'HomeController@testimonial')->name('testimonial');

Route::get('/why', 'HomeController@why')->name('why');

Route::get('/login', 'HomeController@login')->name('login');

Route::get('/signup', 'HomeController@signup')->name('signup');

Route::get('/faq', 'HomeController@faq')->name('faq');

Route::get('/profile', [UserController::class, 'homeutente'])->name('homeutente')->middleware('auth');

Route::post('register', [RegistrationController::class, 'store']);

Route::post('user', [UserController::class, 'checkLogin']);

Route::get('/logout', 'LogoutController@logout')->name('logout');

Route::get('/homeutente', 'HomeController@homeutente')->name('homeutente');

Route::get('/profile', 'HomeController@profile')->name('profile');

Route::get('/provanavbar', 'HomeController@provanavbar')->name('provanavbar');


