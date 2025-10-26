<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index(){
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggan'));
    }

    public function create(){
        return view('pelanggan.create');
    }

    public function store(Request $request){
        // dd($request);
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'nama_pelanggan'    => 'required|string|max:100',
            'no_hp_pelanggan'    => 'required|string|max:100',
            'alamat_pelanggan'    => 'required|string|max:100',
            'jumlah'            => 'required|numeric|min:1',
            'harga_per_satuan'   => 'required|',
            'jenis_satuan'   => 'required',
            'total_harga' => 'required'
        ]);

         Pelanggan::create($validated);

        // 🔹 4. Redirect dengan pesan sukses
        return redirect()->route('pelanggan.index')->with('success', 'Data berhasil disimpan.');

    }

    public function edit($id){
        $pelanggan = Pelanggan::find($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
        // 🔹 Validasi input
        $validated = $request->validate([
            'tanggal'           => 'required|date',
            'nama_pelanggan'    => 'required|string|max:100',
            'alamat_pelanggan'  => 'required|string|max:255',
            'no_hp_pelanggan'   => 'required|string|max:20',
            'jenis_satuan'      => 'required|in:kg,papan',
            'jumlah'            => 'required|numeric|min:1',
            'harga_per_satuan'  => 'required|numeric|min:0',
        ]);

        // 🔹 Hitung total harga otomatis
        // $validated['total_harga'] = $validated['jumlah'] * $validated['harga_per_satuan'];

        // 🔹 Cari data pelanggan berdasarkan ID
        $pelanggan = Pelanggan::findOrFail($id);

        // 🔹 Update data
        $pelanggan->update($validated);

        // 🔹 Redirect dengan pesan sukses
        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil diperbarui.');
    }

     public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Data berhasil dihapus.');
    }

}
