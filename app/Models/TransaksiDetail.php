<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'produk_id',
        'produk_name',
        'transaksi_id',
        'qty',
        'subtotal',
        'dibayarkan', // Pastikan atribut ini terdaftar di sini
    ];
}
