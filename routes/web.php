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

Route::get('/', 'MicropostsController@index'); // 上書き

// ユーザ登録のルーティング
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')
->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')
->name('signup.post');
//(nameはこのルーティングに名前をつけているだけ。Form, link_to_routeで使用。)

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// ユーザ機能
Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' =>
    ['index', 'show' ]]);
    
    Route::group(['prefix' => 'users/{id}'], function() {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
        Route::get('favorites', 'UsersController@favorites')->name('users.favorites'); //お気に入り機能
    });
    
    // お気に入り機能
    Route::group(['prefix' => 'microposts/{id}'], function() {
        Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
        Route::get('favorite_post', 'MicropostsController@favorite_post')->name('microposts.microposts');
    });
    
    Route::resource('microposts', 'MicropostsController',
    ['only' => ['store', 'destroy']]);
});