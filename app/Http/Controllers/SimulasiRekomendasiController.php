<?php

namespace App\Http\Controllers;


use App\Models\Kriteria;
use App\Models\Alternatif;
use Illuminate\Http\Request;

class SimulasiRekomendasiController extends Controller
{
    public function index()
    {
        $alternatifterbaik = '';
        return view('admin.pages.simulasi-rekomendasi', [
            'alternatifterbaik' => $alternatifterbaik,
        ]);
    }

    public function cari(Request $request)
    {

        $request->validate([
            'kepentingan_lokasi' => 'required',
            'kepentingan_harga' => 'required',
            'kepentingan_fasilitas' => 'required',
            'kepentingan_jarak' => 'required',
            'kepentingan_keamanan' => 'required',
            'kepentingan_aksesjalan' => 'required',
        ], [
            'kepentingan_lokasi.required' => 'Kepentingan Lokasi tidak boleh kosong',
            'kepentingan_harga.required' => 'Kepentingan Harga tidak boleh kosong',
            'kepentingan_fasilitas.required' => 'Kepentingan Fasilitas tidak boleh kosong',
            'kepentingan_jarak.required' => 'Kepentingan Jarak tidak boleh kosong',
            'kepentingan_keamanan.required' => 'Kepentingan Keamanan tidak boleh kosong',
            'kepentingan_aksesjalan.required' => 'Kepentingan Akses Jalan tidak boleh kosong',
        ]);

        $kepentinganlokasi = $request->kepentingan_lokasi;
        $kepentinganharga = $request->kepentingan_harga;
        $kepentinganfasilitas = $request->kepentingan_fasilitas;
        $kepentinganjarak = $request->kepentingan_jarak;
        $kepentingankeamanan = $request->kepentingan_keamanan;
        $kepentinganaksesjalan = $request->kepentingan_aksesjalan;

        // ambil semua kepentingan dan masukkan ke array
        $kepentingan = [
            'lokasi' => $kepentinganlokasi,
            'harga' => $kepentinganharga,
            'fasilitas' => $kepentinganfasilitas,
            'jarak' => $kepentinganjarak,
            'keamanan' => $kepentingankeamanan,
            'aksesjalan' => $kepentinganaksesjalan,
        ];


        $jumlahkepentingan = $kepentinganlokasi + $kepentinganharga + $kepentinganfasilitas + $kepentinganjarak + $kepentingankeamanan + $kepentinganaksesjalan;

        $nilaibobotlokasi = $kepentinganlokasi / $jumlahkepentingan;
        $nilaibobotharga = $kepentinganharga / $jumlahkepentingan;
        $nilaibobotfasilitas = $kepentinganfasilitas / $jumlahkepentingan;
        $nilaibobotjarak = $kepentinganjarak / $jumlahkepentingan;
        $nilaibobotkeamanan = $kepentingankeamanan / $jumlahkepentingan;
        $nilaibobotaksesjalan = $kepentinganaksesjalan / $jumlahkepentingan;

        // array nilai bobot
        $nilaibobot = [
            'lokasi' => $nilaibobotlokasi,
            'harga' => $nilaibobotharga,
            'fasilitas' => $nilaibobotfasilitas,
            'jarak' => $nilaibobotjarak,
            'keamanan' => $nilaibobotkeamanan,
            'aksesjalan' => $nilaibobotaksesjalan,
        ];

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

        // nilai pangkat
        $nilaipangkat = [
            'lokasi' => $nilaipangkatlokasi,
            'harga' => $nilaipangkatharga,
            'fasilitas' => $nilaipangkatfasilitas,
            'jarak' => $nilaipangkatjarak,
            'keamanan' => $nilaipangkatkeamanan,
            'aksesjalan' => $nilaipangkataksesjalan,
        ];

        // penghitungan vektor S

        $alternatif = Alternatif::with('kost')->get();
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


        // ambil data vektor S yang sudah disimpan dan data kost nya
        $vektorSwithIdData = [];
        foreach ($vektorSwithId as $key => $value) {
            $vektorSwithIdData[$key] = [
                'id' => $value['id'],
                'vektorS' => $value['vektorS'],
                'data' => Alternatif::with('kost')->where('id', $value['id'])->first()
            ];
        }

        $nilaisdankost =  $vektorSwithIdData;


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

        // ambil satu data kost dengan vektor V terbesar
        $palingrekomendasi = $alternatifterbaikData[0];


        return view('admin.pages.simulasi-rekomendasi', [
            'alternatifterbaik' => $alternatifterbaikData,
            'palingrekomendasi' => $palingrekomendasi,
            'kepentingan' => $kepentingan,
            'nilaibobot' => $nilaibobot,
            'nilaipangkat' => $nilaipangkat,
            'nilaisdankost' => $nilaisdankost,
        ]);
    }
}
