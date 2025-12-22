<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    // Form email
    public function showForgotForm()
    {
        return view('auth.forgot_password');
    }

    // Kirim token reset
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan']);
        }

        $token = Str::random(64);

        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            [
                'token'      => $token,
                'created_at' => now(),
            ]
        );

        // sementara tampilkan link (DEV MODE)
        return redirect('/reset-password/' . $token);

    }

    // Form reset
    public function showResetForm($token)
    {
        return view('auth.reset_password', compact('token'));
    }

    // Simpan password baru
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token'    => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $reset = DB::table('password_resets')
            ->where('token', $request->token)
            ->first();

        if (! $reset) {
            return back()->withErrors(['token' => 'Token tidak valid']);
        }

        User::where('email', $reset->email)
            ->update([
                'password' => Hash::make($request->password),
            ]);

        DB::table('password_resets')
            ->where('email', $reset->email)
            ->delete();

        return redirect()->route('login')
            ->with('success', 'Password berhasil direset, silakan login.');
    }
}
