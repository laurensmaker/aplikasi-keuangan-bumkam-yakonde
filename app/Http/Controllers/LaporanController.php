<?php

namespace App\Http\Controllers;

use DateTime;
use PakanExport;
use App\Models\Pakan;
use App\Models\Produksi;
use App\Models\Pelanggan;
use App\Models\StokKeluar;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function cetak($jenis, Request $request)
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
                 $bulan = $request->get('bulan');
            $tahun = $request->get('tahun');

            // Query dasar
            $queryPemasukan = Pelanggan::query();
            $queryPengeluaran = Pakan::query();

            // Filter bulan dan tahun
            if ($bulan && $tahun) {
                $queryPemasukan->whereMonth('created_at', $bulan)
                               ->whereYear('created_at', $tahun);
                $queryPengeluaran->whereMonth('created_at', $bulan)
                                 ->whereYear('created_at', $tahun);
            } elseif ($tahun) {
                $queryPemasukan->whereYear('created_at', $tahun);
                $queryPengeluaran->whereYear('created_at', $tahun);
            }

            // Hitung total
            $pemasukan = $queryPemasukan->sum('total_harga');
            $pengeluaran = $queryPengeluaran->sum('total_harga');
            $keuntungan = $pemasukan - $pengeluaran;

            // Format nama file sesuai periode
            $periode = "semua_periode";
            if ($bulan && $tahun) {
                $periode = strtolower(DateTime::createFromFormat('!m', $bulan)->format('F')) . '-' . $tahun;
            } elseif ($tahun) {
                $periode = 'tahun-' . $tahun;
            }

            // Siapkan data untuk view PDF
            $data = [
                'pemasukan' => $pemasukan,
                'pengeluaran' => $pengeluaran,
                'keuntungan' => $keuntungan,
                'periode' => $periode,
            ];

            $view = 'laporan.keuangan_pdf';
            $filename = "laporan_keuangan_{$periode}.pdf";
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
