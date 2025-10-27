<?php

namespace App\Http\Controllers;

use App\Models\Pakan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function keuangan(Request $request){

        $bulan = $request->get('bulan');
        $tahun = $request->get('tahun');

        // Query dasar
        $queryPemasukan = Pelanggan::query();
        $queryPengeluaran = Pakan::query();

        // Filter berdasarkan bulan & tahun jika dipilih
        if ($bulan && $tahun) {
            $queryPemasukan->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun);
            $queryPengeluaran->whereMonth('tanggal_masuk', $bulan)->whereYear('tanggal_masuk', $tahun);
        } elseif ($tahun) {
            $queryPemasukan->whereYear('tanggal', $tahun);
            $queryPengeluaran->whereYear('tanggal_masuk', $tahun);
        }

        // Hitung total
        $pemasukan = $queryPemasukan->sum('total_harga');
        $pengeluaran = $queryPengeluaran->sum('total_harga');
        $keuntungan = $pemasukan - $pengeluaran;



        // $pemasukan = Pelanggan::sum('total_harga');   
        // $pengeluaran = Pakan::sum('total_harga');    
        // $keuntungan = $pemasukan - $pengeluaran;

        $pemasukanRp = number_format($pemasukan,0,',','.');
        $pengeluaranRp = number_format($pengeluaran,0,',','.');
        $keuntunganRp = number_format($keuntungan,0,',','.');

        return view('keuangan.keuangan', compact('pemasukanRp', 'pengeluaranRp', 'keuntunganRp', 'bulan', 'tahun'));
    }
}
