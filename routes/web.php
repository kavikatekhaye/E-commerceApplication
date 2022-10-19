<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;

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

Route::get('admin/dashboard',[DashboardController::class,'index']);
// ProductController
Route::get('admin/product/create',[ProductController::class,'create'])->name('admin.product.create');
Route::post('admin/product/store',[ProductController::class,'store'])->name('admin.product.store');
Route::get('admin/product/table',[ProductController::class,'table'])->name('admin.product.table');
Route::get('admin/product/edit/{id}',[ProductController::class,'edit'])->name('admin.product.edit');
Route::post('admin/product/update/{id}',[ProductController::class,'update'])->name('admin.product.update');
Route::get('admin/product/delete/{id}',[ProductController::class,'delete'])->name('admin.product.delete');
