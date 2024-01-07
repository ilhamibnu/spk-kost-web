<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;
use App\Models\Kost;

class KostController extends Controller
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

        return view('admin.pages.kost', [
            'kost' => $kost,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'id_akses_jalan' => 'required',
            'id_fasilitas' => 'required',
            'id_harga' => 'required',
            'id_lokasi' => 'required',
            'id_keamanan' => 'required',
            'id_jarak' => 'required',
        ], [
            'id_akses_jalan.required' => 'Akses jalan harus diisi',
            'id_fasilitas.required' => 'Fasilitas harus diisi',
            'id_harga.required' => 'Harga harus diisi',
            'id_lokasi.required' => 'Lokasi harus diisi',
            'id_keamanan.required' => 'Keamanan harus diisi',
            'id_jarak.required' => 'Jarak harus diisi',
        ]);

        $kost = new Kost();
        $kost->name = $request->name;
        $kost->id_akses_jalan = $request->id_akses_jalan;
        $kost->id_fasilitas = $request->id_fasilitas;
        $kost->id_harga = $request->id_harga;
        $kost->id_lokasi = $request->id_lokasi;
        $kost->id_keamanan = $request->id_keamanan;
        $kost->id_jarak = $request->id_jarak;
        $kost->save();

        $alternatif = new Alternatif();
        $alternatif->id_kost = $kost->id;
        $alternatif->id_aksesjalan = $request->id_akses_jalan;
        $alternatif->id_fasilitas = $request->id_fasilitas;
        $alternatif->id_harga = $request->id_harga;
        $alternatif->id_lokasi = $request->id_lokasi;
        $alternatif->id_keamanan = $request->id_keamanan;
        $alternatif->id_jarak = $request->id_jarak;
        $alternatif->save();

        return redirect()->back()->with('store', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'id_akses_jalan' => 'required',
            'id_fasilitas' => 'required',
            'id_harga' => 'required',
            'id_lokasi' => 'required',
            'id_keamanan' => 'required',
            'id_jarak' => 'required',
        ], [
            'name.required' => 'Nama kost harus diisi',
            'id_akses_jalan.required' => 'Akses jalan harus diisi',
            'id_fasilitas.required' => 'Fasilitas harus diisi',
            'id_harga.required' => 'Harga harus diisi',
            'id_lokasi.required' => 'Lokasi harus diisi',
            'id_keamanan.required' => 'Keamanan harus diisi',
            'id_jarak.required' => 'Jarak harus diisi',
        ]);

        $kost = Kost::find($id);
        $kost->name = $request->name;
        $kost->id_akses_jalan = $request->id_akses_jalan;
        $kost->id_fasilitas = $request->id_fasilitas;
        $kost->id_harga = $request->id_harga;
        $kost->id_lokasi = $request->id_lokasi;
        $kost->id_keamanan = $request->id_keamanan;
        $kost->id_jarak = $request->id_jarak;
        $kost->save();

        $alternatif = Alternatif::where('id_kost', $id)->first();
        $alternatif->id_kost = $kost->id;
        $alternatif->id_aksesjalan = $request->id_akses_jalan;
        $alternatif->id_fasilitas = $request->id_fasilitas;
        $alternatif->id_harga = $request->id_harga;
        $alternatif->id_lokasi = $request->id_lokasi;
        $alternatif->id_keamanan = $request->id_keamanan;
        $alternatif->id_jarak = $request->id_jarak;
        $alternatif->save();

        return redirect()->back()->with('update', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $alternatif = Alternatif::where('id_kost', $id)->first();
        $alternatif->delete();

        $kost = Kost::find($id);
        $kost->delete();

        return redirect()->back()->with('destroy', 'Data berhasil dihapus');
    }
}
