<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AksesJalan;
use App\Models\Alternatif;
use App\Models\Fasilitas;
use App\Models\Keamanan;
use App\Models\Kost;
use App\Models\Harga;
use App\Models\Jarak;
use App\Models\Lokasi;

class SubKriteriaController extends Controller
{
    public function index()
    {
        $aksesjalan = AksesJalan::all();
        $fasilitas = Fasilitas::all();
        $keamanan = Keamanan::all();
        $harga = Harga::all();
        $jarak = Jarak::all();
        $lokasi = Lokasi::all();

        return view('admin.pages.sub-kriteria', [
            'aksesjalan' => $aksesjalan,
            'fasilitas' => $fasilitas,
            'keamanan' => $keamanan,
            'harga' => $harga,
            'jarak' => $jarak,
            'lokasi' => $lokasi,
        ]);
    }
}
