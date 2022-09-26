<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\UserController;
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

use App\Models\Task;
use Illuminate\Http\Request;

/**
 * Azure Login Routes
 */

Route::get('/login/azure', '\App\Http\Middleware\AppAzure@azure')
    ->name('azure.login');
Route::get('/login/azurecallback', '\App\Http\Middleware\AppAzure@azurecallback')
    ->name('azure.callback');
Route::get('/logout/azure', '\App\Http\Middleware\AppAzure@azurelogout')
    ->name('azure.logout');


Route::redirect('/', '/dashboard');

Route::get('/dashboard', function (Request $request) {
    return view('dashboard');
});


Route::get('/artikel', '\App\Http\Controllers\ArtikelController@index')
    ->name('artikel.index');

Route::get('/artikel/ajax', '\App\Http\Controllers\ArtikelController@ajax')
    ->name('artikel.ajax');

Route::get('/artikel/getajax/{id}', '\App\Http\Controllers\ArtikelController@ajax')
    ->name('artikel.getajax');

Route::get('/artikel/download', '\App\Http\Controllers\ArtikelController@download')
    ->name('artikel.download');
