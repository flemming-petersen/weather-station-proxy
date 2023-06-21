<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\StationController;
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

Route::get('/', [StationController::class, 'index']);

Route::group(['middleware' => 'auth.basic'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/{station}', [AdminController::class, 'show']);
    Route::get('/admin/{station}/edit', [AdminController::class, 'edit']);
    Route::put('/admin/{station}', [AdminController::class, 'update'])->name('admin.station.update');
    Route::post('/admin', [AdminController::class, 'store'])->name('admin.station.store');
    Route::delete('/admin/{station}', [AdminController::class, 'destroy']);
    Route::get('/admin/station/create', [AdminController::class, 'create'])->name('admin.station.create');
});

Route::get('/health', function () {
    return response()->json(['status' => 'ok']);
});

Route::get('/weatherstation/updateweatherstation.php', [EntryController::class, 'store']);
