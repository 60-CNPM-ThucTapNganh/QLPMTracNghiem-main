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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::prefix('lops')->group(function () {
    Route::get('/', [
        'as' => 'lops.index', 
        'uses' => 'App\Http\Controllers\LopController@index'
    ]);
    Route::get('/create', [
        'as' => 'lops.create', 
        'uses' => 'App\Http\Controllers\LopController@create'
    ]);

    Route::post('/store', [
        'as' => 'lops.store', 
        'uses' => 'App\Http\Controllers\LopController@store'
    ]);

    Route::get('/edit/{MaLop}', [
        'as' => 'lops.edit',
        'uses' => 'App\Http\Controllers\LopController@edit'
    ]);

    Route::post('/update/{MaLop}', [
        'as' => 'lops.update', 
        'uses' => 'App\Http\Controllers\LopController@update'
    ]);

    Route::get('/delete/{MaLop}', [
        'as' => 'lops.delete', 
        'uses' => 'App\Http\Controllers\LopController@delete'
    ]);
});
