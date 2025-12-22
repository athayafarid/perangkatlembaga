<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // GET /auth → tampilkan halaman login
    public function index()
    {
        return view('auth.login_form');
    }

    // POST /auth/login → proses login
    public function login(Request $request)
    {
        // Validasi input
         $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:3',
            ], [
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Format email tidak valid',
                'password.required' => 'Password tidak boleh kosong',
                'password.min' => 'Password minimal 3 karakter',
            ]);

            // Cek apakah email ada di tabel user
            $user = User::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                Auth::login($user);
                $request->session()->regenerate();
                return redirect()->route('dashboard')->with('success', 'Login berhasil!');
            }

            return back()->with('error', 'Email atau password salah')->withInput();
        }
    // POST /logout → proses logout
    public function logout(Request $request)
    {
        // Hapus session login
        $request->session()->forget('isLoggedIn');
        $request->session()->forget('username');
        $request->session()->flush();

        // Arahkan kembali ke halaman login
        return redirect()->route('auth.index')
            ->with('success', 'Anda telah logout.');
    }
}
