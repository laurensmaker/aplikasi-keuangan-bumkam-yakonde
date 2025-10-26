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
        // dd($request);
        $produksi = $request->validate([
            'tanggal_produksi' => 'required|date',
            'kandang_id' => 'required',
            'jumlah_ayam' => 'required',
            'jumlah_telur' => 'required',
            'berat_total' => 'required',
            'telur_bagus' => 'required',
            'telur_rusak' => 'required',
            'pakan_digunakan' => 'required',
        ]);

        // 🔹 Cek stok pakan terakhir
        $pakanTerbaru = Pakan::where('nama_pakan', $request->nama_pakan)
            ->latest()
            ->first();

        // if (!$pakanTerbaru) {
        //     return redirect()->back()->with('error', 'Stok pakan untuk jenis ini belum tersedia.');
        // }

        // 🔹 Ambil stok sisa terakhir
        $stokSisa = $pakanTerbaru->stok_sisa ?? 0;

        if ($produksi['pakan_digunakan'] > $stokSisa) {
            return redirect()->back()->with('error', 'Jumlah pakan digunakan melebihi stok tersedia (stok saat ini: ' . $stokSisa . ' Kg).');
        }
        
        Produksi::create($produksi);

        StokKeluar::create([
            'kandang_id' => $request->kandang_id,
            'nama_pakan' => $request->nama_pakan,
            'tanggal_keluar' => $request->tanggal_produksi,
            'jumlah_keluar' => $request->pakan_digunakan,
        ]);


         $pakanTerbaru->update([
            'stok_sisa' => $stokSisa - $produksi['pakan_digunakan'],
        ]);

        
        
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
