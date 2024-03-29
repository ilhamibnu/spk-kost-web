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


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'kepentingan' => 'required',
            'jenis' => 'required',
        ], [
            'name.required' => 'Nama kriteria harus diisi',
            'kepentingan.required' => 'Kepentingan harus diisi',
            'jenis.required' => 'Jenis kriteria harus diisi',
        ]);

        $kriteria = Kriteria::find($id);
        $kriteria->name = $request->name;
        $kriteria->kepentingan = $request->kepentingan;
        $kriteria->jenis = $request->jenis;
        $kriteria->save();
        return redirect()->back()->with('update', 'Data berhasil diubah');
    }

}
