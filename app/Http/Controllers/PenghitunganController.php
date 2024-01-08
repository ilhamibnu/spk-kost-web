<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class PenghitunganController extends Controller
{
    public function index()
    {
        $alternatif = Alternatif::with([
            'kost',
            'aksesjalan',
            'fasilitas',
            'keamanan',
            'harga',
            'jarak',
            'lokasi',
        ])->get();
        $kriteria = Kriteria::all();

        return view('admin.pages.penghitungan', [
            'alternatif' => $alternatif,
            'kriteria' => $kriteria,
        ]);
    }
}
