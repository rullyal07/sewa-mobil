<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

 //Route::get('/', function () {
    // return view('perbaikan');
 //});

Route::resource('/', App\Http\Controllers\HomeController::class);
Route::resource('home', App\Http\Controllers\HomeController::class);
Route::resource('mobil', App\Http\Controllers\ShopController::class)->name('index', 'shop');
Route::resource('blogs', App\Http\Controllers\BlogsController::class);
Route::resource('about', App\Http\Controllers\AboutController::class);
Route::resource('contact', App\Http\Controllers\ContactController::class);
Route::resource('shopping cart', App\Http\Controllers\ShoppingCartController::class);
Route::resource('blog detail', App\Http\Controllers\BlogDetailController::class);
Route::resource('admin', App\Http\Controllers\AdminController::class);
Route::resource('courier', App\Http\Controllers\CourierController::class);
Route::resource('clothes', App\Http\Controllers\ClothesController::class);
Route::resource('login', App\Http\Controllers\LoginController::class);
