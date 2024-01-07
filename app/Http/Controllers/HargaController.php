<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use Illuminate\Http\Request;


class HargaController extends Controller
{
    public function index()
    {
        $harga = Harga::all();
        return view('admin.pages.harga', [
            'harga' => $harga
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'bobot' => 'required|numeric|digits_between:1,5',
        ], [
            'name.required' => 'Nama harga harus diisi',
            'bobot.required' => 'Bobot harus diisi',
            'bobot.numeric' => 'Bobot harus berupa angka',
            'bobot.digits_between' => 'Bobot harus berupa angka 1-5',
        ]);

        $harga = new Harga();
        $harga->name = $request->name;
        $harga->bobot = $request->bobot;
        $harga->save();
        return redirect()->back()->with('store', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'bobot' => 'required|numeric|digits_between:1,5',
        ], [
            'name.required' => 'Nama harga harus diisi',
            'bobot.required' => 'Bobot harus diisi',
            'bobot.numeric' => 'Bobot harus berupa angka',
            'bobot.digits_between' => 'Bobot harus berupa angka 1-5',
        ]);

        $harga = Harga::find($id);
        $harga->name = $request->name;
        $harga->bobot = $request->bobot;
        $harga->save();
        return redirect()->back()->with('update', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $harga = Harga::find($id);
        $harga->delete();
        return redirect()->back()->with('destroy', 'Data berhasil dihapus');
    }
}
