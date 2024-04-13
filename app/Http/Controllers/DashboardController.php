<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use App\Models\User;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlah_user = User::where('id_role', 2)->count();
        $jumlah_kost = Kost::count();
        $jumlah_kriteria = Kriteria::count();
        return view('admin.pages.dashboard', [
            'jumlah_user' => $jumlah_user,
            'jumlah_kost' => $jumlah_kost,
            'jumlah_kriteria' => $jumlah_kriteria,
        ]);
    }
}
