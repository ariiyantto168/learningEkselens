<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\DiscountsController;
use App\Http\Controllers\KuponsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PopulersController;
use App\Http\Controllers\CareersControlller;
use App\Http\Controllers\NewclasesController;
use App\Http\Controllers\TestimoniesController;
use App\Http\Controllers\WhislistsController;

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

// privileges -> adduser
Route::get('privileges/users/create-new', [UsersController::class, 'addusers'])->middleware('check.auth');
Route::post('privileges/users/create-new', [UsersController::class, 'addusers_save'])->middleware('check.auth');

// privileges -> create profile
Route::get('privileges/users/create-profile/{user}', [UsersController::class, 'create_profile'])->middleware('check.auth');
Route::post('privileges/users/create-profile/{user}/create-profile', [UsersController::class, 'profile_save'])->middleware('check.auth');

// Categories
Route::get('lecture/categories', [CategoriesController::class, 'index'])->middleware('check.auth');
Route::get('lecture/categories/create-new', [CategoriesController::class, 'create_page'])->middleware('check.auth');
Route::post('lecture/categories/create-new', [CategoriesController::class, 'create_save'])->middleware('check.auth');
Route::get('lecture/categories/update/{categories}', [CategoriesController::class, 'update_page'])->middleware('check.auth');
Route::post('lecture/categories/update/{categories}', [CategoriesController::class, 'update_save'])->middleware('check.auth');
Route::delete('lecture/categories/delete/{categories}', [CategoriesController::class, 'delete'])->middleware('check.auth');


// class
Route::get('lecture/class', [ClassController::class, 'index'])->middleware('check.auth')->middleware('check.auth');
Route::get('lecture/class/create-new', [ClassController::class, 'create_page'])->middleware('check.auth');
Route::post('lecture/class/create-new', [ClassController::class, 'create_save'])->middleware('check.auth');
Route::get('lecture/class/detail/{class}', [ClassController::class, 'class_detail'])->middleware('check.auth');
// subclass
Route::post('lecture/class/detail/{class}/create-subclass', [ClassController::class, 'addsubclass'])->middleware('check.auth');
// hilights
Route::post('lecture/class/detail/{class}/create-hilights', [ClassController::class, 'addhilights'])->middleware('check.auth');
// materies
Route::post('lecture/class/detail/{class}/create-materies', [ClassController::class, 'addmateries'])->middleware('check.auth');
Route::get('lecture/class/detail/{class}/view-materies/{subcls}', [ClassController::class, 'viewmateries'])->middleware('check.auth');
Route::delete('lecture/class/detail/{class}/delete-materies/{materies}', [ClassController::class, 'delete_materies'])->middleware('check.auth');

// Route::get('lecture/class/update/{classes}', [ClassController::class, 'update_page'])->middleware('check.auth');
// Route::get('lecture/class/view/{classes}', [ClassController::class, 'view_page'])->middleware('check.auth');

// Testimonies Users
Route::get('lecture/testimonies', [TestimoniesController::class, 'index'])->middleware('check.auth')->middleware('check.auth');
Route::get('lecture/testimonies/create-new', [TestimoniesController::class, 'create_page'])->middleware('check.auth');
Route::post('lecture/testimonies/create-new', [TestimoniesController::class, 'create_save'])->middleware('check.auth');

// My whislists Users
Route::get('lecture/whislists', [WhislistsController::class, 'index'])->middleware('check.auth')->middleware('check.auth');
Route::get('lecture/whislists/create-new', [WhislistsController::class, 'create_page'])->middleware('check.auth');
Route::post('lecture/whislists/create-new', [WhislistsController::class, 'create_save'])->middleware('check.auth');

// comments
Route::get('lecture/comments', [CommentsController::class, 'index'])->middleware('check.auth')->middleware('check.auth');

// populers
Route::get('trandings/populers', [PopulersController::class, 'index'])->middleware('check.auth')->middleware('check.auth');
Route::get('trandings/populers/create-new', [PopulersController::class, 'create_page'])->middleware('check.auth');
Route::post('trandings/populers/create-new', [PopulersController::class, 'create_save'])->middleware('check.auth');
Route::get('trandings/populers/update/{populers}', [PopulersController::class, 'update_page'])->middleware('check.auth');
Route::post('trandings/populers/update/{populers}', [PopulersController::class, 'update_save'])->middleware('check.auth');


// careers ready program
Route::get('trandings/careers', [CareersControlller::class, 'index'])->middleware('check.auth')->middleware('check.auth');
Route::get('trandings/careers/create-new', [CareersControlller::class, 'create_page'])->middleware('check.auth');
Route::post('trandings/careers/create-new', [CareersControlller::class, 'create_save'])->middleware('check.auth');
Route::get('trandings/careers/update/{careers}', [CareersControlller::class, 'update_page'])->middleware('check.auth');
Route::post('trandings/careers/update/{careers}', [CareersControlller::class, 'update_save'])->middleware('check.auth');

// careers ready program
Route::get('trandings/newclass', [NewclasesController::class, 'index'])->middleware('check.auth')->middleware('check.auth');
Route::get('trandings/newclass/create-new', [NewclasesController::class, 'create_page'])->middleware('check.auth');
Route::post('trandings/newclass/create-new', [NewclasesController::class, 'create_save'])->middleware('check.auth');
Route::get('trandings/newclass/update/{newclass}', [NewclasesController::class, 'update_page'])->middleware('check.auth');
Route::post('trandings/newclass/update/{newclass}', [NewclasesController::class, 'update_save'])->middleware('check.auth');


// Discounts 
Route::get('promotions/discounts', [DiscountsController::class, 'index'])->middleware('check.auth');
Route::get('promotions/discounts/create-new', [DiscountsController::class, 'create_page'])->middleware('check.auth');
Route::post('promotions/discounts/create-new', [DiscountsController::class, 'create_save'])->middleware('check.auth');
Route::get('promotions/discounts/update/{discounts}', [DiscountsController::class, 'update_page'])->middleware('check.auth');
Route::post('promotions/discounts/update/{discounts}', [DiscountsController::class, 'update_save'])->middleware('check.auth');

// Kupons
Route::get('promotions/kupons', [KuponsController::class, 'index'])->middleware('check.auth');