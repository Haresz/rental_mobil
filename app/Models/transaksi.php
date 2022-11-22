<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected   $fillable = [
        'id_mobil', 
        'id_user', 
        'nama_pemesan', 
        'harga', 
        'merek_mobil', 
        'waktu_pembayaran', 
        'metode_pembayaran', 
        'no_hp_admin', 
        'no_hp_pemesan'
    ];
}