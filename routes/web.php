<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerDashboard;
use App\Http\Controllers\WaliKelasController;

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
Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/', [AuthController::class, 'login']);
});

Route::get('/home', function () {
    return redirect('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/dashboard/tambah', [DashboardController::class, 'create']);
    Route::post('/dashboard/simpan', [DashboardController::class, 'store']);
    Route::delete('/dashboard/hapus', [DashboardController::class, 'destroy']);
    Route::get('/dashboard/edit/{id}', [DashboardController::class, 'edit']);
    Route::post('/dashboard/edit/simpan', [DashboardController::class, 'update']);


    //walikaelas
    Route::get('/dashboard/walikelas', [WaliKelasController::class, 'index']);
    Route::get('/dashboard/walikelas/tambah', [WaliKelasController::class, 'create']);
    Route::post('/dashboard/walikelas/simpan', [WaliKelasController::class, 'store']);
    Route::delete('/dashboard/walikelas/hapus', [WaliKelasController::class, 'destroy']);
    Route::get('/dashboard/walikelas/edit/{id}', [WaliKelasController::class, 'edit']);
    Route::post('/dashboard/walikelas/edit/simpan', [WaliKelasController::class, 'update']);


    Route::get('/logout', [AuthController::class, 'logout']);
});

