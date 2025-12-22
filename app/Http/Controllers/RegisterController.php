<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Tampilkan form register
     */
    public function index()
    {
        return view('register');
    }

    /**
     * Simpan user baru (EMAIL)
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'role'     => 'required|in:Admin,Warga',
            'password' => 'required|string|min:6|confirmed',

        ], [
            'name.required'      => 'Nama wajib diisi.',
            'email.required'     => 'Email wajib diisi.',
            'email.email'        => 'Format email tidak valid.',
            'email.unique'       => 'Email sudah terdaftar.',
            'role.required'      => 'Role wajib dipilih',            // <--- PESAN ERROR ROLE
            'role.in'            => 'Role yang dipilih tidak valid', // <--- PESAN ERROR ROLE
            'password.required'  => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'role' => $request->role, // <--- PENAMBAHAN PENYIMPANAN ROLE
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')
            ->with('success', 'Akun berhasil dibuat, silakan login.');
    }
}
