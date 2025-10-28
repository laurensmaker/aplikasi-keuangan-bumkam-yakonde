<?php

namespace App\Http\Controllers;

use App\Models\Pakan;
use App\Models\Produksi;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class DasborController extends Controller
{
    public function dasbor(){
        $produksiTerbaru = Produksi::latest()->first();
        $produksiTotal = Produksi::latest()->get();
        // $pakanTerbaru = Pakan::latest()->first();
        $pakanTotal = Pakan::latest()->get();
        $totalTelurBagus = Produksi::sum('telur_bagus');

        $pemasukan = Pelanggan::sum('total_harga');   
        $pengeluaran = Pakan::sum('total_harga');    
        $keuntungan = $pemasukan - $pengeluaran;

        $pemasukanRp = number_format($pemasukan,0,',','.');
        $pengeluaranRp = number_format($pengeluaran,0,',','.');
        $keuntunganRp = number_format($keuntungan,0,',','.');

        $pelangganTerbaru = Pelanggan::latest()->take(3)->get();
        $totalStok = Pakan::sum('stok_sisa');

        return view('dasbor.index', compact('produksiTerbaru', 'produksiTotal', 'totalStok', 'pakanTotal', 'totalTelurBagus', 'pemasukanRp', 'pengeluaranRp', 'keuntunganRp', 'pelangganTerbaru'));
    }
}
