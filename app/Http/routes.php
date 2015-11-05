<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/logout', 'Auth\AuthController@getLogout');
Route::get('/auth/naver', 'NaverAuthController@redirectToProvider');
Route::get('/auth/naver/callback', 'NaverAuthController@handleProviderCallback');
