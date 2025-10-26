<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    protected $guarded =['id'];

    protected $table = 'produksi';

    public function kandang(){
        return $this->belongsTo(Kandang::class);
    }

    public function pakan()
    {
        return $this->belongsTo(Pakan::class, 'pakan_id');
    }
}
