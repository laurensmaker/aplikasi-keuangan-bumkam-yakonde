<?php

namespace App\Http\Controllers;

use App\Models\Pakan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function keuangan(){
        $pemasukan = Pelanggan::sum('total_harga');   
        $pengeluaran = Pakan::sum('total_harga');    
        $keuntungan = $pemasukan - $pengeluaran;

        $pemasukanRp = number_format($pemasukan,0,',','.');
        $pengeluaranRp = number_format($pengeluaran,0,',','.');
        $keuntunganRp = number_format($keuntungan,0,',','.');

        return view('keuangan.keuangan', compact('pemasukanRp', 'pengeluaranRp', 'keuntunganRp'));
    }
}
