<?php

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
    return view('welcome');
});

// ユーザ登録のルーティング
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')
->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')
->name('signup.post');
//(nameはこのルーティングに名前をつけているだけ。Form, link_to_routeで使用。)