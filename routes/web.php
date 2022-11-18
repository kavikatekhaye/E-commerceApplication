<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
 use App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\FrontController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('admin/dashboard',[DashboardController::class,'index'])->middleware('auth');
// ProductController
Route::get('admin/product/create',[ProductController::class,'create'])->name('admin.product.create')->middleware('auth');
Route::post('admin/product/store',[ProductController::class,'store'])->name('admin.product.store')->middleware('auth');
Route::get('admin/product/table',[ProductController::class,'table'])->name('admin.product.table')->middleware('auth');
Route::get('admin/product/edit/{id}',[ProductController::class,'edit'])->name('admin.product.edit')->middleware('auth');
Route::post('admin/product/update/{id}',[ProductController::class,'update'])->name('admin.product.update')->middleware('auth');
Route::get('admin/product/delete/{id}',[ProductController::class,'delete'])->name('admin.product.delete')->middleware('auth');
Route::get('admin/product/detail/{id}',[ProductController::class,'detail'])->name('admin.product.detail')->middleware('auth');


// OrderController
Route::get('admin/order/table',[OrderController::class,'table'])->name('admin.order.table')->middleware('auth');
Route::get('admin/order/detail/{id}',[OrderController::class,'detail'])->name('admin.order.detail')->middleware('auth');

// UserController
Route::get('admin/user/table',[UserController::class,'table'])->name('admin.user.table')->middleware('auth');
Route::get('admin/user/detail/{id}',[UserController::class,'detail'])->name('admin.user.detail')->middleware('auth');
Route::get('admin/profile',[UserController::class,'profile'])->name('admin.profile')->middleware('auth');
Route::post('update/{id}',[UserController::class,'update'])->name('update')->middleware('auth');


// FrontController
Route::get('/',[FrontController::class,'index'])->name('index');
Route::get('cart',[FrontController::class,'cart'])->name('cart');
Route::get('signup',[FrontController::class,'signup'])->name('signup');
Route::post('store',[FrontController::class,'store'])->name('store');
Route::get('/signin',[FrontController::class,'signin'])->name('signin');
Route::post('/signin',[FrontController::class,'signin_store'])->name('signin.store');
Route::get('/profile',[FrontController::class,'profile'])->name('profile');
Route::post('profile/update/{id}',[FrontController::class,'profile_update'])->name('profile.update');

Route::post('cart/store',[FrontController::class,'cart_store'])->name('cart.store');
Route::get('cart/destroy',[FrontController::class,'destroy'])->name('cart.destroy');
Route::get('cart/remove/{id}',[FrontController::class,'remove'])->name('cart.remove');
Route::get('checkout',[FrontController::class,'checkout'])->name('checkout');
