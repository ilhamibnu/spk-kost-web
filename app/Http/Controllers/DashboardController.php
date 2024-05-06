<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use App\Models\User;
use App\Models\Harga;
use App\Models\Jarak;
use App\Models\Lokasi;
use App\Models\Keamanan;
use App\Models\Kriteria;
use App\Models\Fasilitas;
use App\Models\AksesJalan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlah_user = User::where('id_role', 2)->count();
        $jumlah_kost = Kost::count();
        $jumlah_kriteria = Kriteria::count();

        $kriteria = Kriteria::all();
        $jarak = Jarak::all();
        $fasilitas = Fasilitas::all();
        $harga = Harga::all();
        $lokasi = Lokasi::all();
        $keamanan = Keamanan::all();
        $aksesjalan = AksesJalan::all();

        return view('admin.pages.dashboard', [
            'jumlah_user' => $jumlah_user,
            'jumlah_kost' => $jumlah_kost,
            'jumlah_kriteria' => $jumlah_kriteria,

            'kriteria' => $kriteria,
            'jarak' => $jarak,
            'fasilitas' => $fasilitas,
            'harga' => $harga,
            'lokasi' => $lokasi,
            'keamanan' => $keamanan,
            'aksesjalan' => $aksesjalan
        ]);
    }
}
