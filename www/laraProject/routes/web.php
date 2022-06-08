<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AnnuncioController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\MessaggioController;
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

Route::get('/', function () {return view('index');});

Route::get('/', 'HomeController@index')->name('index');

Route::get('/about', 'HomeController@about')->name('about');

Route::get('/catalogo', 'AnnuncioController@catalogo')->name('catalogo');

Route::get('/why', 'HomeController@why')->name('why');

Route::get('/login', 'HomeController@login')->name('login');

Route::get('/signup', 'HomeController@signup')->name('signup');

Route::get('/faq', 'HomeController@faq')->name('faq');

Route::get('/homeutente', [UserController::class, 'homeutente'])->name('homeutente')->middleware('auth');

Route::get('/homeadmin', [UserController::class, 'homeadmin'])->name('homeadmin')->middleware('auth');

Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');

Route::post('register', [RegistrationController::class, 'store']);

Route::post('user', [UserController::class, 'checkLogin']);

Route::get('/logout', 'LogoutController@logout')->name('logout');



Route::post('addAnnuncio', [AnnuncioController::class, 'addAnnuncio']);

Route::get('/aggAnnuncio', 'AnnuncioController@aggiungiAnnuncio')->name('aggAnnuncio');

Route::get('/dettagli/{id}', 'AnnuncioController@dettagli')->name('dettagli');

Route::post('filterCatalog', [AnnuncioController::class, 'filterCatalog'])->name('filterCatalog');

Route::get('/test2', function(){return View::make('pages.home');});
Route::get('/t1', function(){return View::make('pages.testchat');});


Route::get('/annunci', 'HomeController@annunci')->name('annunci');
Route::get('/annuncioedit/{id}', 'AnnuncioController@annuncioedit')->name('annuncioedit');//vista modifica faq
Route::put('annuncioupdate/{id}', 'AnnuncioController@annuncioupdate')->name('annuncioupdate');

Route::get('/stats', 'HomeController@stats')->name('stats');

Route::get('/profileedit', [UserController::class, 'profileedit'])->name('profileedit')->middleware('auth');
Route::post('update', [UserController::class, 'update']);

Route::get('faqadd', 'FAQController@faqadd')->name('faqadd');
Route::post('faqsave', [FAQController::class, 'faqsave']);
Route::get('/faqedit/{id}', 'FAQController@faqedit')->name('faqedit');//vista modifica faq
Route::put('faqupdate/{id}', 'FAQController@faqupdate')->name('faqupdate');//rotta update faq
Route::get('faqdelete/{id}','FAQController@faqdelete')->name('faqdelete');

Route::get('/chat', 'HomeController@chat')->name('chat');
Route::get('nuovomessaggio', 'MessaggioController@nuovomessaggio')->name('nuovomessaggio');
Route::post('sendMessage', [MessaggioController::class, 'sendMessage']);
Route::get('/messaggi/{id}/{username}', 'MessaggioController@aprichat')->name('messaggi');
Route::put('reply', 'MessaggioController@reply')->name('reply');

//Route::post('/reply', [MessaggioController::class, 'reply']);