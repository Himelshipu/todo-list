<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/home', [App\Http\Controllers\TodoController::class, 'index']);
// Route::post('/home', [App\Http\Controllers\TodoController::class, 'store']);
// Route::patch('/home/{todo}', [App\Http\Controllers\TodoController::class, 'update']);
// Route::delete('/home/{todo}', [App\Http\Controllers\TodoController::class, 'destroy']);

Route::get('todos', [App\Http\Controllers\TodoController::class, 'index'])->name('todos.index');
Route::post('todos', [App\Http\Controllers\TodoController::class, 'store'])->name('todos.store');
Route::patch('todos/{todo}', [App\Http\Controllers\TodoController::class, 'update'])->name('todos.update');
Route::delete('todos/{todo}', [App\Http\Controllers\TodoController::class, 'destroy'])->name('todos.destroy');

Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

