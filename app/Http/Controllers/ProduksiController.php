<?php

namespace App\Http\Controllers;

use App\Models\Pakan;
use App\Models\Kandang;
use App\Models\Produksi;
use App\Models\StokKeluar;
use Illuminate\Http\Request;

class ProduksiController extends Controller
{
    public function index(){
        $produksi = Produksi::with('kandang')->get();
        return view('produksi-telur.index', compact('produksi'));
    }

    public function create(){
        $kandang = Kandang::all();
        return view('produksi-telur.create', compact('kandang'));
    }

    public function store(Request $request){
        // 🔹 Validasi input
        $produksi = $request->validate([
            'tanggal_produksi' => 'required|date',
            'kandang_id' => 'required',
            'jumlah_ayam' => 'required|numeric',
            'jumlah_telur' => 'required|numeric',
            'berat_total' => 'required|numeric',
            'telur_bagus' => 'required|numeric',
            'telur_rusak' => 'required|numeric',
            'pakan_digunakan' => 'required|numeric',
            'nama_pakan' => 'required|string',
        ]);

        // 🔹 Ambil data pakan dari database
        $jagung  = Pakan::where('nama_pakan', 'Jagung Giling')->first();
        $bekatul = Pakan::where('nama_pakan', 'Bekatul (dedak halus)')->first();
        $sorghum = Pakan::where('nama_pakan', 'Sorghum')->first();

        // 🔹 Cek pakan yang digunakan
        $jenisPakan = $request->nama_pakan;
        $jumlahDigunakan = $request->pakan_digunakan;

        // 🔹 Tentukan stok sisa berdasarkan jenis pakan
        $stokSisa = 0;
        $stokMasuk = 0;
        if ($jenisPakan === 'Jagung Giling' && $jagung) {
            $stokSisa = $jagung->stok_sisa;
            $stokMasuk = $jagung->stok_masuk;
        } elseif ($jenisPakan === 'Bekatul (dedak halus)' && $bekatul) {
            $stokSisa = $bekatul->stok_sisa;
            $stokMasuk = $bekatul->stok_masuk;
        } elseif ($jenisPakan === 'Sorghum' && $sorghum) {
            $stokSisa = $sorghum->stok_sisa;
            $stokMasuk = $sorghum->stok_masuk;
        }

        // 🔹 Cek apakah stok cukup
        if ($jumlahDigunakan > $stokMasuk) {
            return redirect()->back()->with('error', 'Jumlah pakan digunakan melebihi stok tersedia (stok saat ini: ' . $stokMasuk . ' Kg).');
        }

        // 🔹 Simpan data produksi telur
        Produksi::create($produksi);

        // 🔹 Catat stok keluar
        StokKeluar::create([
            'kandang_id' => $request->kandang_id,
            'nama_pakan' => $jenisPakan,
            'tanggal_keluar' => $request->tanggal_produksi,
            'jumlah_keluar' => $jumlahDigunakan,
        ]);

        // 🔹 Update stok sisa di database
        if ($jenisPakan === 'Jagung Giling' && $jagung) {
            $jagung->update(['stok_sisa' => $stokSisa - $jumlahDigunakan]);
        } elseif ($jenisPakan === 'Bekatul (dedak halus)' && $bekatul) {
            $bekatul->update(['stok_sisa' => $stokSisa - $jumlahDigunakan]);
        } elseif ($jenisPakan === 'Sorghum' && $sorghum) {
            $sorghum->update(['stok_sisa' => $stokSisa - $jumlahDigunakan]);
        }

        // 🔹 Hitung total seluruh stok pakan (hanya variabel, tidak disimpan)
        $totalPakan = 
            ($jagung->stok_sisa ?? 0) + 
            ($bekatul->stok_sisa ?? 0) + 
            ($sorghum->stok_sisa ?? 0);
        
        return redirect()->route('produksi.index')->with('success', 'Data Berhasil disimpan!');
    }

    public function edit($id){
        $produksi = Produksi::find($id);
        $kandang = Kandang::all();
        return view('produksi-telur.edit', compact('produksi', 'kandang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_produksi' => 'required|date',
            'kandang_id' => 'required|exists:kandang,id',
            'jumlah_ayam' => 'required|numeric|min:0',
            'jumlah_telur' => 'required|numeric|min:0',
            'berat_total' => 'required|numeric|min:0',
            'telur_bagus' => 'required|numeric|min:0',
            'telur_rusak' => 'required|numeric|min:0',
            'pakan_digunakan' => 'nullable|numeric|min:0',
        ]);

        $produksi = Produksi::findOrFail($id);

        $produksi->update([
            'tanggal_produksi' => $request->tanggal_produksi,
            'kandang_id' => $request->kandang_id,
            'jumlah_ayam' => $request->jumlah_ayam,
            'jumlah_telur' => $request->jumlah_telur,
            'berat_total' => $request->berat_total,
            'telur_bagus' => $request->telur_bagus,
            'telur_rusak' => $request->telur_rusak,
            'pakan_digunakan' => $request->pakan_digunakan,
        ]);

        return redirect()->route('produksi.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $produksi = Produksi::findOrFail($id);
        $produksi->delete();

        return redirect()->route('produksi.index')->with('success', 'Data berhasil dihapus.');
    }

}
