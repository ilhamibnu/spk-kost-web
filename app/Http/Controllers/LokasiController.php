<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;


class LokasiController extends Controller
{
    public function index()
    {
        $lokasi = Lokasi::all();
        return view('admin.pages.lokasi', [
            'lokasi' => $lokasi
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'bobot' => 'required|numeric|digits_between:1,5',
        ], [
            'name.required' => 'Nama lokasi harus diisi',
            'bobot.required' => 'Bobot harus diisi',
            'bobot.numeric' => 'Bobot harus berupa angka',
            'bobot.digits_between' => 'Bobot harus berupa angka 1-5',
        ]);

        $lokasi = new Lokasi();
        $lokasi->name = $request->name;
        $lokasi->bobot = $request->bobot;
        $lokasi->save();
        return redirect()->back()->with('store', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'bobot' => 'required|numeric|digits_between:1,5',
        ], [
            'name.required' => 'Nama lokasi harus diisi',
            'bobot.required' => 'Bobot harus diisi',
            'bobot.numeric' => 'Bobot harus berupa angka',
            'bobot.digits_between' => 'Bobot harus berupa angka 1-5',
        ]);

        $lokasi = Lokasi::find($id);
        $lokasi->name = $request->name;
        $lokasi->bobot = $request->bobot;
        $lokasi->save();
        return redirect()->back()->with('update', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $lokasi = Lokasi::find($id);
        $lokasi->delete();
    }
}
