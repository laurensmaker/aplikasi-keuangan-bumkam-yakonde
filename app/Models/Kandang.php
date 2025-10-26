<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kandang extends Model
{
    protected $guarded = ['id'];
    protected $table = 'kandang';

    public function produksi()
    {
        return $this->hasMany(Produksi::class);
    }
}
