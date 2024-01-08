<?php

namespace App\Http\Controllers;

use App\Models\AksesJalan;
use App\Models\Alternatif;
use App\Models\Fasilitas;
use App\Models\Harga;
use App\Models\Jarak;
use App\Models\Keamanan;
use App\Models\Kriteria;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class SimulasiRekomendasiController extends Controller
{
    public function index()
    {


        $alternatifterbaik = '';

        $lokasi = Lokasi::all();
        $harga = Harga::all();
        $fasilitas = Fasilitas::all();
        $jarak = Jarak::all();
        $keamanan = Keamanan::all();
        $aksesjalan = AksesJalan::all();


        return view('admin.pages.simulasi-rekomendasi', [
            'lokasi' => $lokasi,
            'harga' => $harga,
            'fasilitas' => $fasilitas,
            'jarak' => $jarak,
            'keamanan' => $keamanan,
            'aksesjalan' => $aksesjalan,
            'alternatifterbaik' => $alternatifterbaik,
        ]);
    }

    public function cari(Request $request)
    {
        $lokasi = Lokasi::all();
        $harga = Harga::all();
        $fasilitas = Fasilitas::all();
        $jarak = Jarak::all();
        $keamanan = Keamanan::all();
        $aksesjalan = AksesJalan::all();

        $request->validate([
            'id_lokasi' => 'required',
            'id_harga' => 'required',
            'id_fasilitas' => 'required',
            'id_jarak' => 'required',
            'id_keamanan' => 'required',
            'id_aksesjalan' => 'required',
        ], [
            'id_lokasi.required' => 'Lokasi harus diisi',
            'id_harga.required' => 'Harga harus diisi',
            'id_fasilitas.required' => 'Fasilitas harus diisi',
            'id_jarak.required' => 'Jarak harus diisi',
            'id_keamanan.required' => 'Keamanan harus diisi',
            'id_aksesjalan.required' => 'Akses Jalan harus diisi'
        ]);

        $kepentinganlokasi = Lokasi::find($request->id_lokasi)->bobot;
        $kepentinganharga = Harga::find($request->id_harga)->bobot;
        $kepentinganfasilitas = Fasilitas::find($request->id_fasilitas)->bobot;
        $kepentinganjarak = Jarak::find($request->id_jarak)->bobot;
        $kepentingankeamanan = Keamanan::find($request->id_keamanan)->bobot;
        $kepentinganaksesjalan = AksesJalan::find($request->id_aksesjalan)->bobot;

        $jumlahkepentingan = $kepentinganlokasi + $kepentinganharga + $kepentinganfasilitas + $kepentinganjarak + $kepentingankeamanan + $kepentinganaksesjalan;

        $nilaibobotlokasi = $kepentinganlokasi / $jumlahkepentingan;
        $nilaibobotharga = $kepentinganharga / $jumlahkepentingan;
        $nilaibobotfasilitas = $kepentinganfasilitas / $jumlahkepentingan;
        $nilaibobotjarak = $kepentinganjarak / $jumlahkepentingan;
        $nilaibobotkeamanan = $kepentingankeamanan / $jumlahkepentingan;
        $nilaibobotaksesjalan = $kepentinganaksesjalan / $jumlahkepentingan;

        if (Kriteria::all()->where('name', 'Lokasi')->first()->sifat == 'benefit') {
            $nilaipangkatlokasi = pow($nilaibobotlokasi, 1);
        } else {
            $nilaipangkatlokasi = -1 * pow($nilaibobotlokasi, 1);
        }

        if (Kriteria::all()->where('name', 'Harga')->first()->sifat == 'benefit') {
            $nilaipangkatharga = pow($nilaibobotharga, 1);
        } else {
            $nilaipangkatharga = -1 * pow($nilaibobotharga, 1);
        }

        if (Kriteria::all()->where('name', 'Fasilitas')->first()->sifat == 'benefit') {
            $nilaipangkatfasilitas = pow($nilaibobotfasilitas, 1);
        } else {
            $nilaipangkatfasilitas = -1 * pow($nilaibobotfasilitas, 1);
        }

        if (Kriteria::all()->where('name', 'Jarak')->first()->sifat == 'benefit') {
            $nilaipangkatjarak = pow($nilaibobotjarak, 1);
        } else {
            $nilaipangkatjarak = -1 * pow($nilaibobotjarak, 1);
        }

        if (Kriteria::all()->where('name', 'Keamanan')->first()->sifat == 'benefit') {
            $nilaipangkatkeamanan = pow($nilaibobotkeamanan, 1);
        } else {
            $nilaipangkatkeamanan = -1 * pow($nilaibobotkeamanan, 1);
        }

        if (Kriteria::all()->where('name', 'Akses Jalan')->first()->sifat == 'benefit') {
            $nilaipangkataksesjalan = pow($nilaibobotaksesjalan, 1);
        } else {
            $nilaipangkataksesjalan = -1 * pow($nilaibobotaksesjalan, 1);
        }

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

        // ambil id kost nya saja
        $alternatifterbaik = [];
        foreach ($vektorVsorted as $key => $value) {
            $alternatifterbaik[$key] = $value['id'];
        }

        // ambil data kost nya saja
        $alternatifterbaikData = [];
        foreach ($alternatifterbaik as $key => $value) {
            $alternatifterbaikData[$key] = Alternatif::with('kost')->where('id', $value)->first();
        }


        return view('admin.pages.simulasi-rekomendasi', [
            'lokasi' => $lokasi,
            'harga' => $harga,
            'fasilitas' => $fasilitas,
            'jarak' => $jarak,
            'keamanan' => $keamanan,
            'aksesjalan' => $aksesjalan,
            'alternatifterbaik' => $alternatifterbaikData,

        ]);
    }
}
