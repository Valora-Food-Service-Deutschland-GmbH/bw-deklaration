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
Route::get('/', function () {
    error_log("INFO: get /");
    return view('login');
});

Route::get('/login', function () {
    error_log("INFO: get /");
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

/**
    * Show Task Dashboard

Route::get('/', function () {
    error_log("INFO: get /");
    return view('tasks', [
        'tasks' => Task::orderBy('created_at', 'asc')->get()
    ]);
});
*/

/**
    * Add New Task
    */
Route::post('/task', function (Request $request) {
    error_log("INFO: post /task");
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        error_log("ERROR: Add task failed.");
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
});

/**
    * Delete Task
    */
Route::delete('/task/{id}', function ($id) {
    error_log('INFO: delete /task/'.$id);
    Task::findOrFail($id)->delete();

    return redirect('/');
});
