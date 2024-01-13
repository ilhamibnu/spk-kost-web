<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    function loginuser()
    {
        return view('landing.pages.login');
    }

    function registeruser()
    {
        return view('landing.pages.register');
    }

    function myprofil()
    {
        return view('landing.pages.my-profil');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:tb_user,email',
            'password' => 'required',
            'repassword' => 'required|same:password',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password tidak boleh kosong',
            'repassword.required' => 'Re-Password tidak boleh kosong',
            'repassword.same' => 'Re-Password tidak sama dengan password',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->id_role = 2;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/registeruser/#register')->with('registerberhasil', 'Anda berhasil register');
    }

    public function updateprofil(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:tb_user,email,' . Auth::user()->id,
            'repassword' => 'same:password',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.unique' => 'Email sudah terdaftar',
            'repassword.same' => 'Re-Password tidak sama dengan password',
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password != null) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect('/myprofil/#myprofil')->with('update', 'Anda berhasil update profil');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Auth::attempt($credentials)) {

                // cek role
                if (Auth::user()->id_role == '1') {
                    $request->session()->regenerate();
                    return redirect('/kost')->with('login', 'Anda berhasil login');
                } else {
                    $request->session()->regenerate();

                    return redirect('/')->with('login', 'Anda berhasil login');
                }
            } else {
                return  redirect()->back()->with('errorpw', 'Password salah');
            }
        } else {
            return  redirect()->back()->with('erroremail', 'Email salah');
        }
    }

    public function logout(Request $request)
    {
        if (Auth::user()->id_role == '1') {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login')->with('logout', 'Anda berhasil logout');
        } else {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/')->with('logout', 'Anda berhasil logout');
        }
    }
}
