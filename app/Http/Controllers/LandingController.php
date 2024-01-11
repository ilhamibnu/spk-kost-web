<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use Illuminate\Http\Request;


class LandingController extends Controller
{
    public function index()
    {
        $kost = Kost::with([
            'aksesjalan',
            'fasilitas',
            'keamanan',
            'harga',
            'jarak',
            'lokasi',
        ])->get();

        return view('landing.pages.landing', [
            'kost' => $kost,
        ]);
    }

    public function detailkost($id)
    {
        $kost = Kost::with([
            'aksesjalan',
            'fasilitas',
            'keamanan',
            'harga',
            'jarak',
            'lokasi',
        ])->find($id);

        return view('landing.pages.kost-detail', [
            'kost' => $kost,
        ]);
    }
}
