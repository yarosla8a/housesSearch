<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainAdminController;
Route::get('/', 'App\Http\Controllers\PageController@index')->name('i');

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('s', 'App\Http\Controllers\SearchController@search');
//
//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/main', [App\Http\Controllers\MainAdminController::class, 'index'])->middleware(['auth','confirmed']);
//Route::get('user/{user}/request-confirmed', [App\Http\Controllers\UserEmailController::class, 'request'])->name('request-confirm-email') ;
//Route::post('user/{user}/send-email-confirmed', [App\Http\Controllers\UserEmailController::class, 'sendEmail'])->name('send-email-confirmed') ;
//Route::get('user/{user}/confirmed/{token}', [App\Http\Controllers\UserEmailController::class, 'confirm'])->name('confirm') ;
