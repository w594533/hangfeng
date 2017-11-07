<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api', 'prefix' => 'v1'], function () {
  Route::get('/home', 'HomeController@index')->name('home');

  Route::get('/product', 'ProductController@index')->name('product');

  Route::get('/cooperation', 'HomeController@cooperation')->name('cooperation');

  Route::get('/contact', 'HomeController@contact')->name('contact');

  Route::get('/about', 'HomeController@about')->name('about');

  Route::get('/system_info', 'HomeController@systems_info')->name('systems_info');

  Route::get('/join', 'JoinController@index')->name('index');

  Route::get('/news', 'NewsController@index')->name('index');

  Route::get('/news/{post}', 'NewsController@show')->name('news.show');
});
