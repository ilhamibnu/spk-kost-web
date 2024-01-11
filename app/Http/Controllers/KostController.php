<?php

namespace App\Http\Controllers;

use App\Models\AksesJalan;
use App\Models\Alternatif;
use App\Models\Fasilitas;
use App\Models\Keamanan;
use Illuminate\Http\Request;
use App\Models\Kost;
use App\Models\Harga;
use App\Models\Jarak;
use App\Models\Lokasi;

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

        $aksesjalan = AksesJalan::all();
        $fasilitas = Fasilitas::all();
        $keamanan = Keamanan::all();
        $harga = Harga::all();
        $jarak = Jarak::all();
        $lokasi = Lokasi::all();

        return view('admin.pages.kost', [
            'kost' => $kost,
            'aksesjalan' => $aksesjalan,
            'fasilitas' => $fasilitas,
            'keamanan' => $keamanan,
            'harga' => $harga,
            'jarak' => $jarak,
            'lokasi' => $lokasi,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'id_aksesjalan' => 'required',
            'id_fasilitas' => 'required',
            'id_harga' => 'required',
            'id_lokasi' => 'required',
            'id_keamanan' => 'required',
            'id_jarak' => 'required',
        ], [
            'name.required' => 'Nama kost harus diisi',
            'price.required' => 'Price harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'id_aksesjalan.required' => 'Akses jalan harus diisi',
            'id_fasilitas.required' => 'Fasilitas harus diisi',
            'id_harga.required' => 'Harga harus diisi',
            'id_lokasi.required' => 'Lokasi harus diisi',
            'id_keamanan.required' => 'Keamanan harus diisi',
            'id_jarak.required' => 'Jarak harus diisi',
        ]);

        $kost = new Kost();
        $kost->name = $request->name;
        $kost->price = $request->price;
        $kost->alamat = $request->alamat;
        $kost->deskripsi = $request->deskripsi;
        $kost->id_aksesjalan = $request->id_aksesjalan;
        $kost->id_fasilitas = $request->id_fasilitas;
        $kost->id_harga = $request->id_harga;
        $kost->id_lokasi = $request->id_lokasi;
        $kost->id_keamanan = $request->id_keamanan;
        $kost->id_jarak = $request->id_jarak;
        $kost->save();

        $alternatif = new Alternatif();
        $alternatif->id_kost = $kost->id;
        $alternatif->id_aksesjalan = $request->id_aksesjalan;
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
            'price' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'id_aksesjalan' => 'required',
            'id_fasilitas' => 'required',
            'id_harga' => 'required',
            'id_lokasi' => 'required',
            'id_keamanan' => 'required',
            'id_jarak' => 'required',
        ], [
            'name.required' => 'Nama kost harus diisi',
            'price.required' => 'Price harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'id_aksesjalan.required' => 'Akses jalan harus diisi',
            'id_fasilitas.required' => 'Fasilitas harus diisi',
            'id_harga.required' => 'Harga harus diisi',
            'id_lokasi.required' => 'Lokasi harus diisi',
            'id_keamanan.required' => 'Keamanan harus diisi',
            'id_jarak.required' => 'Jarak harus diisi',
        ]);

        $kost = Kost::find($id);
        $kost->name = $request->name;
        $kost->price = $request->price;
        $kost->alamat = $request->alamat;
        $kost->deskripsi = $request->deskripsi;
        $kost->id_aksesjalan = $request->id_aksesjalan;
        $kost->id_fasilitas = $request->id_fasilitas;
        $kost->id_harga = $request->id_harga;
        $kost->id_lokasi = $request->id_lokasi;
        $kost->id_keamanan = $request->id_keamanan;
        $kost->id_jarak = $request->id_jarak;
        $kost->save();

        $alternatif = Alternatif::find($id);
        $alternatif->id_aksesjalan = $request->id_aksesjalan;
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
