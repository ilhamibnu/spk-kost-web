<?php

namespace App\Http\Controllers;

use App\Models\DetailKostFoto;
use Illuminate\Http\Request;


class DetailFotoKostController extends Controller
{
    public function index($id)
    {
        $detailfotokost = DetailKostFoto::where('id_kost', $id)->get();
        return view('admin.pages.detail-foto-kost', [
            'detailfotokost' => $detailfotokost,
            'id_kost' => $id,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'foto.required' => 'Foto Kost Harus Diisi',
            'foto.image' => 'Foto Kost Harus Berupa Gambar',
            'foto.mimes' => 'Foto Kost Harus Berupa Gambar',
        ]);

        $detailfotokost = new DetailKostFoto();
        $detailfotokost->id_kost = $request->id_kost;
        $detailfotokost->foto = time() . $request->foto->getClientOriginalName();
        $detailfotokost->save();

        $filename = $detailfotokost->foto;
        $request->foto->move(public_path('images/detailkost/'), $filename);

        return redirect()->back()->with('store', 'Foto Kost Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'foto.required' => 'Foto Kost Harus Diisi',
            'foto.image' => 'Foto Kost Harus Berupa Gambar',
            'foto.mimes' => 'Foto Kost Harus Berupa Gambar',
        ]);

        // hapus foto lama
        $detailfotokost = DetailKostFoto::find($id);
        unlink(public_path('images/detailkost/') . $detailfotokost->foto);

        // upload foto baru
        $detailfotokost->foto = time() . $request->foto->getClientOriginalName();
        $detailfotokost->save();

        $filename = $detailfotokost->foto;

        $request->foto->move(public_path('images/detailkost/'), $filename);
        return redirect()->back()->with('update', 'Foto Kost Berhasil Diubah');
    }

    public function destroy($id)
    {
        $detailfotokost = DetailKostFoto::find($id);
        unlink(public_path('images/detailkost/') . $detailfotokost->foto);
        $detailfotokost->delete();
        return redirect()->back()->with('destroy', 'Foto Kost Berhasil Dihapus');
    }
}
