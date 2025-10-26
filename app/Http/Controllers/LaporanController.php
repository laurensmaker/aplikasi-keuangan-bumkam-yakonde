<?php

namespace App\Http\Controllers;

use PakanExport;
use App\Models\Pakan;
use App\Models\Produksi;
use App\Models\Pelanggan;
use App\Models\StokKeluar;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function cetak($jenis)
    {
        switch ($jenis) {
            case 'pakan':
                $data = Pakan::all();
                $view = 'laporan.pakan_pdf';
                $filename = 'laporan_pakan.pdf';
                break;

            case 'produksi':
                $data = Produksi::with('kandang')->get();
                $view = 'laporan.produksi_pdf';
                $filename = 'laporan_produksi.pdf';
                break;

            case 'stok_keluar':
                $data = StokKeluar::with('kandang')->get();
                $view = 'laporan.stok_keluar_pdf';
                $filename = 'laporan_stok_keluar.pdf';
                break;

            case 'keuangan':
                // Hitung pemasukan dan pengeluaran
                $pemasukan = Pelanggan::sum('total_harga');   // total harga penjualan telur
                $pengeluaran = Pakan::sum('total_harga');     // total harga stok masuk
                $keuntungan = $pemasukan - $pengeluaran;

                // Siapkan data untuk view
                $data = [
                    'pemasukan' => $pemasukan,
                    'pengeluaran' => $pengeluaran,
                    'keuntungan' => $keuntungan,
                ];

                $view = 'laporan.keuangan_pdf';
                $filename = 'laporan_keuangan.pdf';
                break;

            default:
                return redirect()->back()->with('error', 'Jenis laporan tidak ditemukan.');
        }

        // Buat PDF dari view sesuai jenis laporan
        $pdf = Pdf::loadView($view, ['data' => $data]);
        return $pdf->download($filename);
    }

    // Fungsi export Excel
    // private function exportExcel($data)
    // {
    //     return Excel::download(new PakanExport, 'laporan_pakan.xlsx');
    // }
}
