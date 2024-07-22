<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\PeminjamanController;

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

// Route::get('/', function () {
//     return view('welcome');
// })->middleware('guest');


Route::middleware('auth')->group(function() {
    //DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index']);

    //INVENTARIS
    Route::get('/inventaris', [InventarisController::class, 'index']);
    Route::get('/inventaris/create', [InventarisController::class, 'create']);
    Route::post('/inventaris', [InventarisController::class, 'store']);
    Route::get('/inventaris/{id}/edit', [InventarisController::class, 'edit']);
    Route::put('/inventaris/{id}', [InventarisController::class, 'update']);
    Route::delete('/inventaris/{id}', [InventarisController::class, 'destroy']);
    
    // PEMINJAM
    Route::get('/peminjam', [PeminjamController::class, 'index']);
    Route::get('/peminjam/create', [PeminjamController::class, 'create']);
    Route::post('/peminjam', [PeminjamController::class, 'store']);
    Route::get('/peminjam/{id}/edit', [PeminjamController::class, 'edit']);
    Route::put('/peminjam/{id}', [PeminjamController::class, 'update']);
    Route::delete('/peminjam/{id}', [PeminjamController::class, 'destroy']);
    
    //PEMINJAMAN
    Route::get('/peminjaman', [PeminjamanController::class, 'index']);
    Route::get('/peminjaman/create', [PeminjamanController::class, 'create']);
    Route::post('/peminjaman', [PeminjamanController::class, 'store']);
    Route::put('/peminjaman/update-status', [PeminjamanController::class, 'updateStatus']);
    Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'destroy']);
});

// AUTH
    Route::get('/', function() {
        return view('auth.index');
    })->name('login')->middleware('guest');

    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::post('/logout', [AuthController::class, 'logout']);
