<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;


class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::all();
        return view('admin.pages.fasilitas', [
            'fasilitas' => $fasilitas
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'bobot' => 'required|numeric|digits_between:1,5',
        ], [
            'name.required' => 'Nama fasilitas harus diisi',
            'bobot.required' => 'Bobot harus diisi',
            'bobot.numeric' => 'Bobot harus berupa angka',
            'bobot.digits_between' => 'Bobot harus berupa angka 1-5',
        ]);

        $fasilitas = new Fasilitas();
        $fasilitas->name = $request->name;
        $fasilitas->bobot = $request->bobot;
        $fasilitas->save();
        return redirect()->back()->with('store', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'bobot' => 'required|numeric|digits_between:1,5',
        ], [
            'name.required' => 'Nama fasilitas harus diisi',
            'bobot.required' => 'Bobot harus diisi',
            'bobot.numeric' => 'Bobot harus berupa angka',
            'bobot.digits_between' => 'Bobot harus berupa angka 1-5',
        ]);

        $fasilitas = Fasilitas::find($id);
        $fasilitas->name = $request->name;
        $fasilitas->bobot = $request->bobot;
        $fasilitas->save();
        return redirect()->back()->with('update', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $fasilitas = Fasilitas::find($id);
        $fasilitas->delete();
        return redirect()->back()->with('destroy', 'Data berhasil dihapus');
    }
}
