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

Route::get('xxx' , 'AAAController@bbb');

// Route::get('admin/profile/create','Admin\ProfileController@add' );
// Route::get('admin/profile/edit','Admin\ProfileController@edit' );

Route::group(['prefix' => 'admin/profile'] , function() {
    Route::get('/create','Admin\ProfileController@add' );
    Route::get('/edit','Admin\ProfileController@edit' );
});

// Route::get('URL','こんとろーらー@アクション' )
// memomemomemo

Route::group(['prefix' => 'admin'] , function() {
    Route::get('news/create','Admin\NewsController@add' );
});
