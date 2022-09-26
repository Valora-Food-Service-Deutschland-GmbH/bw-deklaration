<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\UserController;
use \Dcblogdev\MsGraph\Facades\MsGraph;
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

use Illuminate\Http\Request;

/**
 * Azure Login Routes
 */

Route::group(['middleware' => ['web', 'guest'], 'namespace' => 'App\Http\Controllers\Auth'], function(){
    Route::get('login', 'AuthController@login')->name('login');
    Route::get('connect', 'AuthController@connect')->name('connect');
});

Route::group(['middleware' => ['web', 'MsGraphAuthenticated'], 'prefix' => 'app', 'namespace' => 'App\Http\Controllers'], function(){
    Route::redirect('/', 'dashboard');
    Route::get('logout', 'Auth\AuthController@logout')->name('logout');

    Route::get('/dashboard', function () {
        $me = MsGraph::get('me');
        return view('dashboard')->with('me', $me);
    });

    Route::get('/artikel', '\App\Http\Controllers\ArtikelController@index')
        ->name('artikel.index');

    Route::get('/artikel/{id}', '\App\Http\Controllers\ArtikelController@getarticle')
        ->name('artikel.get');

    Route::get('/artikel/ajax', '\App\Http\Controllers\ArtikelController@ajax')
        ->name('artikel.ajax');

    Route::get('/artikel/getajax/{id}', '\App\Http\Controllers\ArtikelController@getajax')
        ->name('artikel.getajax');

    Route::get('/artikel/download', '\App\Http\Controllers\ArtikelController@download')
        ->name('artikel.download');
});
