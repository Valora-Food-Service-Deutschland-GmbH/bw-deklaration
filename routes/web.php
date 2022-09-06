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

Route::get('/bla', function () {
    return view('bla');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/user', 'index');
    Route::get('/user/{id}','show');
    Route::get('user/{id}/edit','edit');
    Route::post('/user/{id}/update','update');
    Route::get('/user/create', 'create');
    Route::post('/user/store','store');
    Route::post('/user/{id}/destroy,','destroy');
});

Route::controller(ArtikelController::class)->group(function () {
    Route::get('/artikel', 'index');
    Route::get('/artikel/{id}','show');
    Route::get('/artikel/{id}/edit','edit');
    Route::post('/artikel/{id}/update','update');
    Route::get('/artikel/create', 'create');
    Route::post('/artikel/store','store');
    Route::post('/artikel/{id}/destroy,','destroy');
    Route::get('/artikel/makelabel','makelabel');
    Route::post('/artikel/download','download');
});
