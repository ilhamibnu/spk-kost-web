<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function index()
    {
        if (Auth::check() == null) {
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
        } else {
            if (Auth::user()->id_role == 1) {
                return redirect('/kost');
            } else {
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
        }
    }

    public function detailkost($id)
    {
        if (Auth::check() == null) {
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
        } else {
            if (Auth::user()->id_role == 1) {
                return redirect('/kost');
            } else {
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
    }
}
