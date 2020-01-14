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
Route::get('/', 'Auth\AuthController@getlogin')->name('auth.getLogin');
Route::get('/register/user', 'Auth\AuthController@getRegister')->name('auth.getRegister');
Route::post('/register', 'Auth\AuthController@postRegister')->name('auth.postRegister');
Route::post('/login', 'Auth\AuthController@postlogin')->name('auth.postLogin');
Route::get('/logout', 'Auth\AuthController@logout')->name('auth.logout');

//News
Route::get('/dashboard', 'NewsController@index')->name('dashboard.index');
Route::get('/news/ajax/','NewsController@ajax')->name('management.news.ajax');
Route::get('/news/delete/{id}', 'NewsController@delete')->name('management.news.delete');
Route::resource('news','NewsController');
//Comment
Route::get('/comment/ajax/{id}','CommentController@ajax')->name('management.comment.ajax');
Route::get('/comment/delete/{id}', 'CommentController@delete')->name('management.comment.delete');
Route::get('/comment/create/{id}','CommentController@create')->name('management.comment.create');
Route::get('/comment', 'CommentController@index')->name('management.comment.index');
Route::resource('comment','CommentController');
//User
Route::get('/user/ajax','UserController@ajax')->name('management.user.ajax');
Route::get('/user/delete/{id}', 'UserController@delete')->name('management.user.delete');
Route::get('/user/profile', 'UserController@profile')->name('management.user.profile');
Route::resource('user','UserController');
Route::get('/user', 'UserController@index')->name('management.user.index');
//User Profile
Route::get('/userprofile/{id}', 'UserProfileController@index')->name('userprofile.index');
Route::resource('userprofile','UserProfileController');
