<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainUserController;
use App\Http\Controllers\MainAdminController;
use App\Http\Controllers\CategoryController;



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
    return view('pages.index');
});

Route::group(['prefix'=>'admin','middleware'=>['admin:admin']],function(){

        Route::get('/login',[AdminController::class, 'loginForm']);
        Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard');

//User Dash
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('user.index');
})->name('dashboard');

Route::get('/admin/logout',[AdminController::class, 'destroy'])->name('admin.logout');


//User Route
Route::get('/user/logout',[MainUserController::class, 'Logout'])->name('user.logout');
Route::get('/user/profile',[MainUserController::class, 'UserProfile'])->name('user.profile');
Route::get('/user/profile/edit',[MainUserController::class, 'UserProfileEdit'])->name('profile.edit');
Route::post('/user/profile/store',[MainUserController::class, 'UserProfileStore'])->name('profile.store');
Route::get('/user/password/view',[MainUserController::class, 'UserPasswordView'])->name('user.password.view');
Route::post('/user/password/update',[MainUserController::class, 'UserPasswordUpdate'])->name('password.update');


//Admin Route
Route::get('/admin/profile',[MainAdminController::class, 'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit',[MainAdminController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store',[MainAdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/password/view',[MainAdminController::class, 'AdminPasswordChange'])->name('admin.password.view');
Route::post('/admin/password/update',[MainAdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');
//Admin Category
Route::get('/admin/categories',[CategoryController::class, 'Category'])->name('admin.category');
Route::post('/admin/categories/store',[CategoryController::class, 'StoreCategory'])->name('store.category');
Route::get('/admin/categories/delete/{id}',[CategoryController::class, 'DelCategory']);
Route::get('/admin/categories/edit/{id}',[CategoryController::class, 'EditCategory']);
Route::post('/admin/categories/update/{id}',[CategoryController::class, 'UpdateCategory'])->name('update.category');
