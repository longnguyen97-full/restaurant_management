<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImportExcelController;
use App\Http\Controllers\ExportExcelController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', [DashboardController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::resource('items', ItemController::class);
Route::resource('blogs', BlogController::class);

// Import-Export
Route::controller(ImportExcelController::class)->group(function () {
    Route::get('import', 'index');
    Route::get('import/excel', 'import')->name('import.excel');
});
Route::controller(ExportExcelController::class)->group(function () {
    Route::get('export', 'index');
    Route::get('export/excel', 'export')->name('export.excel');
});
