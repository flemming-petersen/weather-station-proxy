<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\AdminController;
use Illuminate\Routing\RouteGroup;

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

// routes shold be protected by basic auth
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth.basic');

Route::get('/health', function () {
    return response()->json(['status' => 'ok']);
});

Route::get('/weatherstation/updateweatherstation.php', [EntryController::class, 'store']);
