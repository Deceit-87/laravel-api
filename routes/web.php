<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
 ister web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')
->name('admin.')
->prefix('admin')
->namespace('Admin')
->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    // Route::get('/contact','HomeController@index');
    Route::resource('posts','PostController');


});

    // COME INTERCETTARE TUTTE LE ROTTE

// Route::get('{any?}',function($param){
//     return view('guest.home');
// })->where('any','.*');

Route::fallback(function(){
    return view('guest.home');
});

    // COME INTERCETTARE TUTTE LE ROTTE

