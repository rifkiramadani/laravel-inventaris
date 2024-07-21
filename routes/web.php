<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventarisController;

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

Route::get('/', function () {
    return view('welcome');
});

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