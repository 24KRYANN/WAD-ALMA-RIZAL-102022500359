<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';
        
    public $timestamps = false; 

    protected $fillable = [
        'nama_pelanggan', 
        'nomor_hp', 
        'alamat_lengkap', 
        'jenis_paket', 
        'kuantitas'
    ];
}