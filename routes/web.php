<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesananController;

// Bikin halaman web langsung mengarah ke data pesanan saat baru dibuka
Route::get('/', function () {
    return redirect('/pesanan');
});

// Route otomatis untuk fitur CRUD lengkap (Create, Read, Update, Delete)
Route::resource('pesanan', PesananController::class);