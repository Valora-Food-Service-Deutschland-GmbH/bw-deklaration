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
    Route::get('/user', 'index')->name('user.index');
    Route::get('/user/{id}','show')->name('user.show');
    Route::get('user/{id}/edit','edit')->name('user.edit');
    Route::post('/user/{id}/update','update')->name('user.update');
    Route::get('/user/create', 'create')->name('user.create');
    Route::post('/user/store','store')->name('user.store');
    Route::post('/user/{id}/destroy,','destroy')->name('user.destroy');
});

Route::controller(ArtikelController::class)->group(function () {
    Route::get('/artikel', 'index')->name('artikel.index');
    Route::get('/artikel/{id}','show')->name('artikel.show');
    Route::get('/artikel/{id}/edit','edit')->name('artikel.edit');
    Route::post('/artikel/{id}/update','update')->name('artikel.update');
    Route::get('/artikel/create', 'create')->name('artikel.create');
    Route::post('/artikel/store','store')->name('artikel.store');
    Route::post('/artikel/{id}/destroy,','destroy')->name('artikel.destroy');
    Route::get('/artikel/makelabel','makelabel')->name('artikel.makelabel');
    Route::post('/artikel/download','download')->name('artikel.download');
});
