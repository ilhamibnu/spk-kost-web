<?php

namespace App\Http\Controllers;

use App\Models\SimpanKost;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('id_role', 2)->get();
        return view('admin.pages.user', [
            'user' => $user
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:tb_user,email',
            'password' => 'required',
            'repassword' => 'required|same:password',
            'image' => 'image|mimes:jpg,jpeg,png'

        ], [
            'name.required' => 'Name tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
            'email.unique' => 'Email sudah terdaftar!',
            'password.required' => 'Password tidak boleh kosong!',
            'repassword.required' => 'Re-Password tidak boleh kosong!',
            'repassword.same' => 'Re-Password tidak sama dengan Password!',
            'image.image' => 'File harus berupa gambar!',
            'image.mimes' => 'File harus berupa gambar dengan format jpg, jpeg, png!'

        ]);

        $file = $request->file('image');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        // pindahkan file ke folder public
        $file->move('fotouser', $nama_file);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $nama_file,
            'password' => bcrypt($request->password),
            'id_role' => 2

        ]);

        return redirect('/user')->with('store', 'Data User Berhasil Ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:tb_user,email,' . $id,
            'repassword' => 'same:password',

        ], [
            'name.required' => 'Name tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
            'repassword.same' => 'Re-Password tidak sama dengan Password!',
        ]);

        if ($request->image != null) {
            $request->validate([
                'image' => 'image|mimes:jpg,jpeg,png'
            ], [
                'image.image' => 'File harus berupa gambar!',
                'image.mimes' => 'File harus berupa gambar dengan format jpg, jpeg, png!'
            ]);

            // hapus file lama
            $user = User::find($id);
            if ($user->image != null) {
                unlink('fotouser/' . $user->image);
            }

            $file = $request->file('image');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            // pindahkan file ke folder public
            $file->move('fotouser', $nama_file);
        }

        $user = User::find($id);
        if ($request->password == null && $request->image == null) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'image' => $request->image == null ? $user->image : $nama_file
            ]);
        }
        return redirect('/user')->with('update', 'Data User Berhasil Diubah!');
    }

    public function destroy($id)
    {
        // cek apakah punya data di simpan kost
        $simpanKost = SimpanKost::where('id_user', $id)->get();
        if (count($simpanKost) > 0) {
            // foreach delete
            foreach ($simpanKost as $simpan) {
                $simpan->delete();
            }

            // delete user
            $user = User::find($id);
            $user->delete();
        } else {

            // hapus foto
            $user = User::find($id);
            if ($user->image != null) {
                unlink('fotouser/' . $user->image);
            }
            // delete user
            $user = User::find($id);
            $user->delete();
        }
        return redirect('/user')->with('destroy', 'Data User Berhasil Dihapus!');
    }
}
