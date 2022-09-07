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


/**
 * Test Azure Login
 */
Route::redirect('/', '/dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::resources([
    'artikel' => \App\Http\Controllers\ArtikelController::class,
    'users' => \App\Http\Controllers\UserController::class,
]);

Route::get('/artikel/download', '\App\Http\Controllers\ArtikelController@download')
->name('artikel.download');

Route::get('/artikel/makelabel', '\App\Http\Controllers\ArtikelController@makelabel')
    ->name('artikel.makelabel');
