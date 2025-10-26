<?php

namespace App\Http\Controllers;

use App\Models\Pakan;
use App\Models\StokKeluar;
use Illuminate\Http\Request;

class PakanController extends Controller
{
    public function index(){
        $pakan = Pakan::all();
        return view('pakan.index', compact('pakan'));
    }

    public function create(){
        return view('pakan.create');
    }

    public function store(Request $request){
         $request->validate([
            'nama_pakan' => 'required|string|max:50',
            'stok_awal' => 'nullable|numeric|min:0',
            'stok_masuk' => 'nullable|numeric|min:0',
            'harga_per_kg' => 'nullable|numeric|min:0',
            'tanggal_masuk' => 'nullable|date',
        ]);

        $lastPakan = Pakan::orderBy('id', 'desc')->first();
        $stok_awal = $lastPakan ? ($lastPakan->stok_awal + $lastPakan->stok_masuk) : 0;

            // Hitung stok akhir
        // $stokKeluarBaru = StokKeluar::latest()->first();
        // $stokSisa = $stok_awal + ($request->stok_masuk ?? 0) - $stokKeluarBaru->jumlah_keluar;

        $stokSisa = $stok_awal + ($request->stok_masuk ?? 0);
        
        Pakan::create([
            'nama_pakan' => $request->nama_pakan,
            'stok_awal' => $stok_awal ?? 0,
            'stok_masuk' => $request->stok_masuk ?? 0,
            'harga_per_kg' => $request->harga_per_kg ?? 0,
            'tanggal_masuk' => $request->tanggal_masuk,
            'stok_sisa' => $stokSisa
        ]);

        
        return redirect()->route('pakan.index')->with('success', 'Data pakan berhasil disimpan.');
    }


    public function edit($id){
        $pakan = Pakan::find($id);
        return view('pakan.edit', compact('pakan'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'tanggal_masuk' => 'required|date',
            'nama_pakan' => 'required|string|max:50',
            'stok_masuk' => 'required|numeric|min:0',
        ]);

        $pakan = Pakan::findOrFail($id);

        $pakan->update([
            'tanggal_masuk' => $request->tanggal_masuk,
            'stok_awal' => $stok_awal ?? 0,
            'nama_pakan' => $request->nama_pakan,
            'stok_masuk' => $request->stok_masuk,
            
        ]);

        return redirect()->route('pakan.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pakan = Pakan::findOrFail($id);
        $pakan->delete();
        return redirect()->route('pakan.index')->with('success', 'Data berhasil dihapus.');
    }
}
