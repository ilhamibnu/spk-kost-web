<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
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

    function resetpasswordindex()
    {
        return view('landing.pages.resetpassword');
    }

    public function resetpassword(Request $request)
    {
        $request->validate([
            'email' => ['required'],
        ], [
            'email.required' => 'Email tidak boleh kosong',
        ]);

        $user = User::where('email', $request->email)->where('id_role', 2)->first();

        if ($user) {
            try {

                $mail = new PHPMailer(true);

                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'mail.semnasjkgsby.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'admin@semnasjkgsby.com';                     //SMTP username
                $mail->Password   = '%CQw$!a@@#%U';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('admin@semnasjkgsby.com', 'Admin e-Kostan');
                $mail->addAddress($request->email);     //Add a recipient

                $Code = substr((str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ")), 0, 10);

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Password Reset';
                $mail->Body    = 'To reset your password, please click the link below:<br><br><a href="http://127.0.0.1:8000/changepassword/' . $Code . '">Reset Password</a>';
                $updatecode = User::where('email', '=', $request->email)->first();
                $updatecode->code = $Code;
                $updatecode->status_code = 'aktif';
                $updatecode->save();

                $mail->send();
            } catch (Exception $e) {
            }
            return redirect('/resetpassword/#reset')->with('resetpassword', 'Reset Password Berhasil');
        } else {
            return redirect('/resetpassword/#reset')->with('emailtidakada', 'Reset Password Gagal');
        }
    }

    public function changePassword($code)
    {
        $user = User::where('code', $code)->where('status_code', 'aktif')->where('id_role', 2)->first();
        if ($user) {
            return view('landing.pages.gantipassword', [
                'user' => $user
            ]);
        } else {
            return redirect('/loginuser/#login')->with('linkkadaluarsa', 'Reset Password Gagal');
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'repassword' => 'required|same:password',
        ], [
            'password.required' => 'Password tidak boleh kosong',
            'repassword.required' => 'Re-Password tidak boleh kosong',
            'repassword.same' => 'Re-Password tidak sama dengan password',
        ]);

        $user = User::where('code', $request->code)->where('status_code', 'aktif')->where('id_role', 2)->first();
        if ($user) {
            $user->password = bcrypt($request->password);
            $user->code = $request->code;
            $user->status_code = 'kadaluarsa';
            $user->save();
            return redirect('/loginuser/#login')->with('resetpasswordberhasil', 'Reset Password Berhasil');
        } else {
            return redirect('/')->with('linkkadaluarsa', 'Reset Password Gagal');
        }
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
        $user->code = '0';
        $user->status_code = '0';
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
        $user->id_role = 2;
        $user->code = '0';
        $user->status_code = '0';
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
