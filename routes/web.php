<?php

use App\Http\Controllers\Admin\AdminProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::resource('/users', AdminUserController::class)->middleware('auth');
Route::resource('/categories', CategoryController::class)->middleware('auth');
Route::resource('/projects', AdminProjectController::class)->middleware('auth');
//Tasks
Route::resource('/tasks', TaskController::class)->middleware('auth');
Route::get('/tasks/user/{user:username}', [TaskController::class, 'get_tasks_by_user'])->middleware('auth');
Route::get('/tasks/{task:slug}/setComplete', [TaskController::class, 'set_complete_status'])->middleware('auth');
