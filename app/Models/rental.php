<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rental extends Model
{
    use HasFactory;
    protected $fillable = [
        'merek', 
        'warna', 
        'tahun_pembuatan', 
        'transmisi', 
        'tempat_duduk', 
        'ban_penggerak', 
        'bahan_bakar', 
        'audio', 
        'harga'
    ];
    protected $table = 'rental';
}
