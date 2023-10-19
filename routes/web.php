<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerDashboard;

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

// Testing Login
 Route::prefix('dashboard')->group(function () {
    Route::get('/', [ControllerDashboard::class, 'index']);
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    
});
