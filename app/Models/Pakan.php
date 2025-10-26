<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pakan extends Model
{
    protected $table  = 'pakan';
    protected $guarded = ['id'];
    protected static function booted()
    {
        static::saving(function ($model) {
            $model->total_harga = $model->stok_masuk * $model->harga_per_kg;
        });
    }

    public function produksi()
    {
        return $this->hasMany(Produksi::class, 'pakan_id');
    }

   
}
