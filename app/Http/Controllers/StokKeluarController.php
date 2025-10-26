<?php

namespace App\Http\Controllers;

use App\Models\StokKeluar;
use Illuminate\Http\Request;

class StokKeluarController extends Controller
{
    public function index(){
        $stokKeluar = StokKeluar::all();
        return view('stok-keluar.index', compact('stokKeluar'));
    }
}
