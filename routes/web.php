<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PesananController; // Pastikan ini ada di atas
// Rute Login & Logout
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Admin dan Petugas boleh melihat, menambah, mengubah
Route::middleware(['auth', 'role:admin,petugas'])->group(function () {
    Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
    Route::get('/pesanan/create', [PesananController::class, 'create'])->name('pesanan.create');
    Route::post('/pesanan', [PesananController::class, 'store'])->name('pesanan.store');
    Route::get('/pesanan/{id}/edit', [PesananController::class, 'edit'])->name('pesanan.edit');
    Route::put('/pesanan/{id}', [PesananController::class, 'update'])->name('pesanan.update');
});

// HANYA Admin yang boleh menghapus
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/pesanan/{id}', [PesananController::class, 'destroy'])->name('pesanan.destroy');
});