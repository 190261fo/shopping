<?php

use Illuminate\Support\Facades\Route;

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

// 初期状態はLaravelのトップページに行く設定
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// /homeのルーティングは削除
// Route::get('/home', 'HomeController@index')->name('home');

// トップページを変更
Route::get('/', 'HomeController@index')->name('home');

Route::group([
    'prefix' => 'admin/item',
    'namespace' => 'Admin',
    'as' => 'admin.item.',
    ], function () {
    Route::get('/', 'ItemController@index')->name('index');
    Route::get('create/', 'ItemController@create')->name('create');
    Route::post('add/', 'ItemController@add')->name('add');
    Route::get('edit/{id}', 'ItemController@edit')->name('edit');
    Route::post('update/{id}', 'ItemController@update')->name('update');
    // Route::post('destroy/{id}', 'ItemController@destroy')->name('destroy');
});
