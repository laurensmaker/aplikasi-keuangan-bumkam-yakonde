<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokKeluar extends Model
{
    protected $guarded = ['id'];
    protected $table = 'stok_keluar';

    public function kandang(){
        return $this->belongsTo(Kandang::class);
    }
}
