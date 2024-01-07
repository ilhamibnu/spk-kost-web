<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;



class AlternatifController extends Controller
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
        return view('admin.pages.alternatif', [
            'alternatif' => $alternatif,
        ]);
    }
}
