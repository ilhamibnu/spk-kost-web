<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\SimpanKost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Session;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        session::flash('cari', $request->cari);
        session::flash('kepentingan_lokasi', $request->kepentingan_lokasi);
        session::flash('kepentingan_harga', $request->kepentingan_harga);
        session::flash('kepentingan_fasilitas', $request->kepentingan_fasilitas);
        session::flash('kepentingan_jarak', $request->kepentingan_jarak);
        session::flash('kepentingan_keamanan', $request->kepentingan_keamanan);
        session::flash('kepentingan_aksesjalan', $request->kepentingan_aksesjalan);
        session::flash('jenis_kost', $request->jenis_kost);


        // jika nilai kepentingan ada yang bernilai 0 maka tidak usah dihitung
        if ($request->kepentingan_lokasi == 0 || $request->kepentingan_harga == 0 || $request->kepentingan_fasilitas == 0 || $request->kepentingan_jarak == 0 || $request->kepentingan_keamanan == 0 || $request->kepentingan_aksesjalan == 0) {

            $alternatifterbaik = '';
            $cari = $request->cari;

            if (Auth::check() == null) {
                $kost = Kost::with([
                    'aksesjalan',
                    'fasilitas',
                    'keamanan',
                    'harga',
                    'jarak',
                    'lokasi',
                ])->where('name', 'like', '%' . $cari . '%')->paginate(4);

                // jika ajax
                if ($request->ajax()) {
                    $view = view('landing.data.landing', [
                        'kost' => $kost,
                        'alternatifterbaik' => $alternatifterbaik,
                        'cari' => $cari,
                    ])->render();
                    return response()->json(['html' => $view]);
                }

                return view('landing.pages.landing', [
                    'kost' => $kost,
                    'alternatifterbaik' => $alternatifterbaik,
                    'cari' => $cari,
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
                    ])->where('name', 'like', '%' . $cari . '%')->paginate(4);

                    // jika ajax
                    if ($request->ajax()) {
                        $view = view('landing.data.landing', [
                            'kost' => $kost,
                            'alternatifterbaik' => $alternatifterbaik,
                            'cari' => $cari,
                        ])->render();
                        return response()->json(['html' => $view]);
                    }

                    return view('landing.pages.landing', [
                        'kost' => $kost,
                        'alternatifterbaik' => $alternatifterbaik,
                        'cari' => $cari,

                    ]);
                }
            }
        } else {

            $kepentinganlokasi = $request->kepentingan_lokasi;
            $kepentinganharga = $request->kepentingan_harga;
            $kepentinganfasilitas = $request->kepentingan_fasilitas;
            $kepentinganjarak = $request->kepentingan_jarak;
            $kepentingankeamanan = $request->kepentingan_keamanan;
            $kepentinganaksesjalan = $request->kepentingan_aksesjalan;
            $jenis_kost = $request->jenis_kost;

            $jumlahkepentingan = $kepentinganlokasi + $kepentinganharga + $kepentinganfasilitas + $kepentinganjarak + $kepentingankeamanan + $kepentinganaksesjalan;

            $nilaibobotlokasi = $kepentinganlokasi / $jumlahkepentingan;
            $nilaibobotharga = $kepentinganharga / $jumlahkepentingan;
            $nilaibobotfasilitas = $kepentinganfasilitas / $jumlahkepentingan;
            $nilaibobotjarak = $kepentinganjarak / $jumlahkepentingan;
            $nilaibobotkeamanan = $kepentingankeamanan / $jumlahkepentingan;
            $nilaibobotaksesjalan = $kepentinganaksesjalan / $jumlahkepentingan;

            if (Kriteria::all()->where('name', 'Lokasi')->first()->jenis == 'Benefit') {
                $nilaipangkatlokasi = pow($nilaibobotlokasi, 1);
            } else {
                $nilaipangkatlokasi = -1 * pow($nilaibobotlokasi, 1);
            }

            if (Kriteria::all()->where('name', 'Harga')->first()->jenis == 'Benefit') {
                $nilaipangkatharga = pow($nilaibobotharga, 1);
            } else {
                $nilaipangkatharga = -1 * pow($nilaibobotharga, 1);
            }

            if (Kriteria::all()->where('name', 'Fasilitas')->first()->jenis == 'Benefit') {
                $nilaipangkatfasilitas = pow($nilaibobotfasilitas, 1);
            } else {
                $nilaipangkatfasilitas = -1 * pow($nilaibobotfasilitas, 1);
            }

            if (Kriteria::all()->where('name', 'Jarak')->first()->jenis == 'Benefit') {
                $nilaipangkatjarak = pow($nilaibobotjarak, 1);
            } else {
                $nilaipangkatjarak = -1 * pow($nilaibobotjarak, 1);
            }

            if (Kriteria::all()->where('name', 'Keamanan')->first()->jenis == 'Benefit') {
                $nilaipangkatkeamanan = pow($nilaibobotkeamanan, 1);
            } else {
                $nilaipangkatkeamanan = -1 * pow($nilaibobotkeamanan, 1);
            }

            if (Kriteria::all()->where('name', 'Akses Jalan')->first()->jenis == 'Benefit') {
                $nilaipangkataksesjalan = pow($nilaibobotaksesjalan, 1);
            } else {
                $nilaipangkataksesjalan = -1 * pow($nilaibobotaksesjalan, 1);
            }

            // penghitungan vektor S

            // $alternatif = Alternatif::with('kost')->get();

            if ($jenis_kost == '0') {
                $alternatif = Alternatif::with('kost')->get();
            } else {
                // join alternatif dengan tabel kost berdasarkan jenis kost
                $alternatif = Alternatif::with('kost')->whereHas('kost', function ($query) use ($jenis_kost) {
                    $query->where('jenis_kost', $jenis_kost);
                })->get();
            }


            $vektorS = [];
            foreach ($alternatif as $key => $value) {
                $vektorS[$key] = pow($value->lokasi->bobot, $nilaipangkatlokasi) * pow($value->harga->bobot, $nilaipangkatharga) * pow($value->fasilitas->bobot, $nilaipangkatfasilitas) * pow($value->jarak->bobot, $nilaipangkatjarak) * pow($value->keamanan->bobot, $nilaipangkatkeamanan) * pow($value->aksesjalan->bobot, $nilaipangkataksesjalan);
            }

            // simpan vektor S ke array beserta id kost nya
            $vektorSwithId = [];
            foreach ($alternatif as $key => $value) {
                $vektorSwithId[$key] = [
                    'id' => $value->id,
                    'vektorS' => $vektorS[$key]
                ];
            }

            // penghitungan vektor V
            $vektorV = [];
            foreach ($alternatif as $key => $value) {
                $vektorV[$key] = $vektorSwithId[$key]['vektorS'] / array_sum($vektorS);
            }

            // simpan vektor V ke array beserta id kost nya
            $vektorVwithId = [];
            foreach ($alternatif as $key => $value) {
                $vektorVwithId[$key] = [
                    'id' => $value->id,
                    'vektorV' => $vektorV[$key]
                ];
            }

            // sorting vektor V dari yang terbesar
            $vektorVsorted = collect($vektorVwithId)->sortByDesc('vektorV')->values()->all();

            // ambil id kost dan vektor V nya saja
            $alternatifterbaik = [];
            foreach ($vektorVsorted as $key => $value) {
                $alternatifterbaik[$key] = [
                    'id' => $value['id'],
                    'vektorV' => $value['vektorV']
                ];
            }

            // tambahkan data kost dan vektor V nya
            $alternatifterbaikData = [];
            foreach ($alternatifterbaik as $key => $value) {
                $alternatifterbaikData[$key] = [
                    'id' => $value['id'],
                    'vektorV' => $value['vektorV'],
                    'data' => Alternatif::with('kost')->where('id', $value['id'])->first()
                ];
            }

            // pagination
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $itemCollection = collect($alternatifterbaikData);
            $perPage = 4;
            $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
            $paginatedItems = new LengthAwarePaginator($currentPageItems, count($itemCollection), $perPage);
            $paginatedItems->setPath($request->url());



            if ($request->ajax()) {
                $view = view('landing.data.landing', [
                    'alternatifterbaik' => $paginatedItems,
                    'cari' => 'filter',
                    'kepentinganlokasi' => $kepentinganlokasi,
                    'kepentinganharga' => $kepentinganharga,
                    'kepentinganfasilitas' => $kepentinganfasilitas,
                    'kepentinganjarak' => $kepentinganjarak,
                    'kepentingankeamanan' => $kepentingankeamanan,
                    'kepentinganaksesjalan' => $kepentinganaksesjalan,
                    'jenis_kost' => $jenis_kost,
                ])->render();
                return response()->json(['html' => $view]);
            }

            return view('landing.pages.landing', [
                'palingrekomendasi' => $alternatifterbaikData[0],
                'alternatifterbaik' => $paginatedItems,
                'cari' => 'filter',
                'kepentingan_lokasi' => $kepentinganlokasi,
                'kepentingan_harga' => $kepentinganharga,
                'kepentingan_fasilitas' => $kepentinganfasilitas,
                'kepentingan_jarak' => $kepentinganjarak,
                'kepentingan_keamanan' => $kepentingankeamanan,
                'kepentingan_aksesjalan' => $kepentinganaksesjalan,
                'jenis_kost' => $jenis_kost,
            ]);
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

            $kostfavorite = SimpanKost::select('id_kost')->groupBy('id_kost')->orderByRaw('COUNT(*) DESC')->where('id_kost', '!=', $id)->limit(5)->get();

            return view('landing.pages.kost-detail', [
                'kost' => $kost,
                'kostfavorite' => $kostfavorite,
                'whitelist' => 'notlogin',
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

                $kostfavorite = SimpanKost::select('id_kost')->groupBy('id_kost')->orderByRaw('COUNT(*) DESC')->where('id_kost', '!=', $id)->limit(5)->get();

                $cekwhitelist = SimpanKost::where('id_kost', $id)->where('id_user', Auth::user()->id)->first();
                if ($cekwhitelist == null) {
                    $whitelist = 0;
                } else {
                    $whitelist = 1;
                }

                return view('landing.pages.kost-detail', [
                    'kost' => $kost,
                    'kostfavorite' => $kostfavorite,
                    'whitelist' => $whitelist,
                ]);
            }
        }
    }

    public function whitelist(Request $request)
    {
        if (Auth::check() == null) {
            return redirect('/loginuser');
        } else {
            if (Auth::user()->id_role == 1) {
                return redirect('/kost');
            } else {
                $simpankost = SimpanKost::with('kost')->where('id_user', Auth::user()->id)->paginate(4);

                if ($request->ajax()) {
                    $view = view('landing.data.whitelist', [
                        'kost' => $simpankost,
                    ])->render();
                    return response()->json(['html' => $view]);
                }

                return view('landing.pages.whitelist', [
                    'kost' => $simpankost,
                ]);
            }
        }
    }

    public function simpanwhitelist(Request $request)
    {
        $id_kost = $request->id_kost;
        $id_user = $request->id_user;

        $cek = SimpanKost::where('id_kost', $id_kost)->where('id_user', $id_user)->first();
        if ($cek != null) {
            return response()->json(['error' => 'Kost sudah ada di daftar simpan']);
        }

        SimpanKost::create([
            'id_kost' => $id_kost,
            'id_user' => $id_user,
        ]);

        return response()->json(['success' => 'Kost berhasil disimpan ke daftar simpan']);
    }

    public function deletewhitelist(Request $request)
    {
        $id_kost = $request->id_kost;
        $id_user = $request->id_user;

        $cek = SimpanKost::where('id_kost', $id_kost)->where('id_user', $id_user)->first();
        if ($cek == null) {
            return response()->json(['error' => 'Kost tidak ada di daftar simpan']);
        }

        SimpanKost::where('id_kost', $id_kost)->where('id_user', $id_user)->delete();

        return response()->json(['success' => 'Kost berhasil dihapus dari daftar simpan']);
    }

    public function about()
    {
        return view('landing.pages.about');
    }
}
