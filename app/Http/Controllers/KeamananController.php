<?php

namespace App\Http\Controllers;

use App\Models\Keamanan;
use Illuminate\Http\Request;


class KeamananController extends Controller
{
    public function index()
    {
        $keamanan = Keamanan::all();
        return view('admin.pages.keamanan', [
            'keamanan' => $keamanan
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'bobot' => 'required|numeric|digits_between:1,5',
        ], [
            'name.required' => 'Nama keamanan harus diisi',
            'bobot.required' => 'Bobot harus diisi',
            'bobot.numeric' => 'Bobot harus berupa angka',
            'bobot.digits_between' => 'Bobot harus berupa angka 1-5',
        ]);

        $keamanan = new Keamanan();
        $keamanan->name = $request->name;
        $keamanan->bobot = $request->bobot;
        $keamanan->save();
        return redirect()->back()->with('store', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'bobot' => 'required|numeric|digits_between:1,5',
        ], [
            'name.required' => 'Nama keamanan harus diisi',
            'bobot.required' => 'Bobot harus diisi',
            'bobot.numeric' => 'Bobot harus berupa angka',
            'bobot.digits_between' => 'Bobot harus berupa angka 1-5',
        ]);

        $keamanan = Keamanan::find($id);
        $keamanan->name = $request->name;
        $keamanan->bobot = $request->bobot;
        $keamanan->save();
        return redirect()->back()->with('update', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $keamanan = Keamanan::find($id);
        $keamanan->delete();
    }
}
