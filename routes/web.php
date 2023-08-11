<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserScreenController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;

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

Route::get('/', [UserScreenController::class, 'welcome']);
Route::get('/services', [UserScreenController::class, 'services']);
Route::get('/about', [UserScreenController::class, 'about']);
Route::get('/contact', [UserScreenController::class, 'contact']);

// Auth::routes();

Route::get('/member', [MemberController::class, 'index']);

Route::resource('items', ItemController::class)->only(['index', 'show']);
Route::resource('blogs', BlogController::class)->only(['index', 'show']);
Route::resource('carts', CartController::class)->only(['index', 'store', 'update', 'destroy']);
Route::get('/checkout', [CartController::class, 'checkout']);
