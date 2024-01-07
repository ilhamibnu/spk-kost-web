<?php

namespace App\Http\Controllers;

use App\Models\AksesJalan;
use Illuminate\Http\Request;


class AksesJalanController extends Controller
{
    public function index()
    {
        $akses_jalan = AksesJalan::all();
        return view('admin.pages.aksesjalan', [
            'akses_jalan' => $akses_jalan
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'bobot' => 'required|numeric|digits_between:1,5',
        ], [
            'name.required' => 'Nama akses jalan harus diisi',
            'bobot.required' => 'Bobot harus diisi',
            'bobot.numeric' => 'Bobot harus berupa angka',
            'bobot.digits_between' => 'Bobot harus berupa angka 1-5',
        ]);

        $akses_jalan = new AksesJalan();
        $akses_jalan->name = $request->name;
        $akses_jalan->bobot = $request->bobot;
        $akses_jalan->save();
        return redirect()->back()->with('store', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'bobot' => 'required|numeric|digits_between:1,5',
        ], [
            'name.required' => 'Nama akses jalan harus diisi',
            'bobot.required' => 'Bobot harus diisi',
            'bobot.numeric' => 'Bobot harus berupa angka',
            'bobot.digits_between' => 'Bobot harus berupa angka 1-5',
        ]);

        $akses_jalan = AksesJalan::find($id);
        $akses_jalan->name = $request->name;
        $akses_jalan->bobot = $request->bobot;
        $akses_jalan->save();
        return redirect()->back()->with('update', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $akses_jalan = AksesJalan::find($id);
        $akses_jalan->delete();
        return redirect()->back()->with('destroy', 'Data berhasil dihapus');
    }
}
