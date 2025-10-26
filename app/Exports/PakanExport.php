<?php

use App\Models\Pakan;

class PakanExport implements FromCollection
{
    public function collection()
    {
        return Pakan::select('nama_pakan', 'stok_masuk', 'harga_per_kg', 'total_harga', 'created_at')->get();
    }
}