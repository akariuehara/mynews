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





// Route::get('URL','こんとろーらー@アクション' )
// memomemomemo


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('news/create', 'Admin\NewsController@add');
    Route::post('news/create', 'Admin\NewsController@create'); # 追記
});
Route::group(['prefix' => 'admin/profile', 'middleware' => 'auth'], function () {
    Route::get('/create', 'Admin\ProfileController@add');
    Route::post('/create', 'Admin\ProfileController@add');
    Route::post('/create', 'Admin\ProfileController@create');
    Route::get('/edit', 'Admin\ProfileController@edit');
    Route::post('/edit', 'Admin\ProfileController@update');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
    Route::post('news/create', 'Admin\NewsController@create')->middleware('auth');
    Route::get('news', 'Admin\NewsController@index')->middleware('auth');
    Route::get('news/edit', 'Admin\NewsController@edit')->middleware('auth'); // 追記
    Route::post('news/edit', 'Admin\NewsController@update')->middleware('auth'); // 追記
    Route::get('news/delete', 'Admin\NewsController@delete')->middleware('auth');
});

Route::get('/', 'NewsController@index');
Route::get('/profile', 'ProfileController@index');
