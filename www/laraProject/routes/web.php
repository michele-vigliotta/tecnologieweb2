<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AnnuncioController;
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

Route::get('/catalogo', 'AnnuncioController@catalogo')->name('catalogo');

Route::get('/testimonial', 'HomeController@testimonial')->name('testimonial');

Route::get('/why', 'HomeController@why')->name('why');

Route::get('/login', 'HomeController@login')->name('login');

Route::get('/signup', 'HomeController@signup')->name('signup');

Route::get('/faq', 'HomeController@faq')->name('faq');

Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');

Route::post('register', [RegistrationController::class, 'store']);

Route::post('user', [UserController::class, 'checkLogin']);

Route::get('/logout', 'LogoutController@logout')->name('logout');

Route::get('/homelocatore', 'HomeController@homelocatore')->name('homelocatore');

Route::post('addAnnuncio', [AnnuncioController::class, 'addAnnuncio']);

Route::get('/prova', 'AnnuncioController@aggiungiAnnuncio')->name('prova');

Route::get('/dettagli', 'AnnuncioController@dettagli')->name('dettagli');
