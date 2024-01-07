<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;


class KriteriaController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();
        return view('admin.pages.kriteria', [
            'kriteria' => $kriteria
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'kepentingan' => 'required|numeric|digits_between:1,5',
            'jenis' => 'required',
        ], [
            'name.required' => 'Nama kriteria harus diisi',
            'kepentingan.required' => 'Kepentingan harus diisi',
            'kepentingan.numeric' => 'Kepentingan harus berupa angka',
            'kepentingan.digits_between' => 'Kepentingan harus berupa angka 1-5',
            'jenis.required' => 'Jenis kriteria harus diisi',
        ]);

        $kriteria = new Kriteria();
        $kriteria->name = $request->name;
        $kriteria->kepentingan = $request->kepentingan;
        $kriteria->jenis = $request->jenis;
        $kriteria->save();
        return redirect()->back()->with('store', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'kepentingan' => 'required|numeric|digits_between:1,5',
            'jenis' => 'required',
        ], [
            'name.required' => 'Nama kriteria harus diisi',
            'kepentingan.required' => 'Kepentingan harus diisi',
            'kepentingan.numeric' => 'Kepentingan harus berupa angka',
            'kepentingan.digits_between' => 'Kepentingan harus berupa angka 1-5',
            'jenis.required' => 'Jenis kriteria harus diisi',
        ]);

        $kriteria = Kriteria::find($id);
        $kriteria->name = $request->name;
        $kriteria->kepentingan = $request->kepentingan;
        $kriteria->jenis = $request->jenis;
        $kriteria->save();
        return redirect()->back()->with('update', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $kriteria = Kriteria::find($id);
        $kriteria->delete();
        return redirect()->back()->with('destroy', 'Data berhasil dihapus');
    }
}
