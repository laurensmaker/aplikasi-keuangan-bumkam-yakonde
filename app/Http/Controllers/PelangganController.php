<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'nama_pelanggan' => 'required|string|max:100',
            'no_hp_pelanggan' => 'required|string|max:100',
            'alamat_pelanggan' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:1', // jumlah rak
            'harga_per_satuan' => 'required|numeric|min:0',
            'jenis_satuan' => 'required|string',
            'total_harga' => 'nullable|numeric|min:0',
        ]);

        // 🔹 Cek stok telur bagus dari tabel produksi telur
        $stokTelurBagus = Produksi::sum('telur_bagus');

        // 🔹 Konversi jumlah rak menjadi butir telur
        if (strtolower($request->jenis_satuan) === 'rak') {
            $jumlahTelur = $request->jumlah * 30; // 1 rak = 30 butir
        } else {
            $jumlahTelur = $request->jumlah;
        }

        // 🔹 Validasi stok cukup
        if ($jumlahTelur > $stokTelurBagus) {
            return redirect()->back()->with('error', 'Jumlah telur yang dibeli (' . $jumlahTelur . ' butir) melebihi stok tersedia (' . $stokTelurBagus . ' butir).');
        }

        // 🔹 Hitung total harga
        $totalHarga = $request->harga_per_satuan * $request->jumlah;

        // 🔹 Simpan data pelanggan
        Pelanggan::create([
            'tanggal' => $request->tanggal,
            'nama_pelanggan' => $request->nama_pelanggan,
            'no_hp_pelanggan' => $request->no_hp_pelanggan,
            'alamat_pelanggan' => $request->alamat_pelanggan,
            'jumlah' => $request->jumlah, // simpan jumlah telur (dalam butir)
            'harga_per_satuan' => $request->harga_per_satuan,
            'jenis_satuan' => $request->jenis_satuan,
            'total_harga' => $totalHarga,
        ]);

        // 🔹 Kurangi stok telur bagus di tabel produksi
        // ambil produksi terakhir lalu update stok
        $produksiTerbaru = \App\Models\Produksi::latest()->first();
        if ($produksiTerbaru) {
            $produksiTerbaru->update([
                'telur_bagus' => $produksiTerbaru->telur_bagus - $jumlahTelur
            ]);
        }

        return redirect()->route('pelanggan.index')->with('success', 'Data berhasil disimpan dan stok telur diperbarui.');
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
