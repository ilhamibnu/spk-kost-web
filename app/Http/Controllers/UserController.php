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

        ], [
            'name.required' => 'Name tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
            'email.unique' => 'Email sudah terdaftar!',
            'password.required' => 'Password tidak boleh kosong!',
            'repassword.required' => 'Re-Password tidak boleh kosong!',
            'repassword.same' => 'Re-Password tidak sama dengan Password!',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
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

        $user = User::find($id);
        if ($request->password == null) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
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
            // delete user
            $user = User::find($id);
            $user->delete();
        }
        return redirect('/user')->with('destroy', 'Data User Berhasil Dihapus!');
    }
}
