<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $guarded = ['id'];

     protected static function booted()
    {
        static::saving(function ($model) {
            // Hitung total harga otomatis
            $model->total_harga = $model->jumlah * $model->harga_per_satuan;
        });
    }
}
