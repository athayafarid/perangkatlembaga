<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'username' => 'required',
            'password' => [
                'required',
                'min:3',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/[A-Z]/', $value)) {
                        $fail('Password harus mengandung minimal satu huruf kapital.');
                    }
                },
            ],
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 3 karakter.',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        // RULE LOGIN: username harus sama dengan password
        if ($username === $password) {

            // Simpan session login
            $request->session()->put('isLoggedIn', true);
            $request->session()->put('username', $username);

            // TAMPILKAN success.blade DENGAN PESAN
            return view('auth.success', [
                'message' => "Selamat datang, $username! Login berhasil."
            ]);
        }

        return back()
            ->withErrors(['login' => 'Username dan password harus sama untuk login.'])
            ->withInput();
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
