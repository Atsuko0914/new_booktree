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
Auth::routes();
// Googleでログイン
Route::prefix('login')->name('login.')->group(function () {
  Route::get('/{provider}', 'Auth\LoginController@redirectToProvider')->name('{provider}');
  Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('{provider}.callback');
});
Route::prefix('register')->name('register.')->group(function () {
  Route::get('/{provider}', 'Auth\RegisterController@showProviderUserRegistrationForm')->name('{provider}');
  Route::post('/{provider}', 'Auth\RegisterController@registerProviderUser')->name('{provider}');
});


// ゲストユーザーログイン
Route::get('guest', 'Auth\LoginController@guestLogin')->name('login.guest');
Route::get('/', 'Auth\LoginController@getLogin')->name('auth.login');
Route::get('articles/index', 'ArticleController@index');
Route::resource('/articles', 'ArticleController')->except(['auth.login'])->middleware('auth');
Route::prefix('articles')->name('articles.')->group(function () {
  Route::put('/{article}/like', 'ArticleController@like')->name('like')->middleware('auth');
  Route::delete('/{article}/like', 'ArticleController@unlike')->name('unlike')->middleware('auth');
});
Route::resource('/books', 'BookController')->except(['auth.login'])->middleware('auth');

// マイページ
Route::get('/user/index', 'UserController@index')->name('user.index')->middleware('auth');
Route::get('/user/{authUser}/userEdit', 'UserController@userEdit')->name('user.userEdit')->middleware('auth');
Route::patch('/user/userEdit', 'UserController@userUpdate')->name('user.userUpdate')->middleware('auth');

