<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ClassController;

// ====================================================//

Route::get('login', [AuthController::class, 'login']);
Route::post('login-do', [AuthController::class, 'do_login']);
Route::get('logout', [AuthController::class, 'logout']);
// home
Route::get('/', [HomeController::class, 'index'])->middleware('check.auth');
// privileges -> user
Route::get('privileges/users', [UsersController::class, 'index'])->middleware('check.auth');
Route::get('privileges/users/update/{user}', [UsersController::class, 'update_page'])->middleware('check.auth');
Route::post('privileges/users/update/{user}', [UsersController::class, 'update_save'])->middleware('check.auth');
Route::post('privileges/users/save-privileges/{user}', [UsersController::class, 'save_privileges'])->middleware('check.auth');
// privileges -> module
Route::get('privileges/module', [ModuleController::class, 'index'])->middleware('check.auth');
Route::get('privileges/module/create-new', [ModuleController::class, 'create_page'])->middleware('check.auth');
Route::post('privileges/module/create-new', [ModuleController::class, 'create_save'])->middleware('check.auth');

// Categories
Route::get('lecture/categories', [CategoriesController::class, 'index']);
Route::get('lecture/categories/create-new', [CategoriesController::class, 'create_page']);
Route::post('lecture/categories/create-new', [CategoriesController::class, 'create_save']);

// class
Route::get('lecture/class', [ClassController::class, 'index'])->middleware('check.auth');
Route::get('lecture/class/create-new', [ClassController::class, 'create_page']);
Route::post('lecture/class/create-new', [ClassController::class, 'create_save']);