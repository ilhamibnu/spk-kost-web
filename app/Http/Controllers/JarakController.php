<?php

namespace App\Http\Controllers;

use App\Models\Jarak;
use Illuminate\Http\Request;


class JarakController extends Controller
{
    public function index()
    {
        $jarak = Jarak::all();
        return view('admin.pages.jarak', [
            'jarak' => $jarak
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'bobot' => 'required|numeric|digits_between:1,5',
        ], [
            'name.required' => 'Nama jarak harus diisi',
            'bobot.required' => 'Bobot harus diisi',
            'bobot.numeric' => 'Bobot harus berupa angka',
            'bobot.digits_between' => 'Bobot harus berupa angka 1-5',
        ]);

        $jarak = new Jarak();
        $jarak->name = $request->name;
        $jarak->bobot = $request->bobot;
        $jarak->save();
        return redirect()->back()->with('store', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'bobot' => 'required|numeric|digits_between:1,5',
        ], [
            'name.required' => 'Nama jarak harus diisi',
            'bobot.required' => 'Bobot harus diisi',
            'bobot.numeric' => 'Bobot harus berupa angka',
            'bobot.digits_between' => 'Bobot harus berupa angka 1-5',
        ]);

        $jarak = Jarak::find($id);
        $jarak->name = $request->name;
        $jarak->bobot = $request->bobot;
        $jarak->save();
        return redirect()->back()->with('update', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $jarak = Jarak::find($id);
        $jarak->delete();
        return redirect()->back()->with('destroy', 'Data berhasil dihapus');
    }
}
