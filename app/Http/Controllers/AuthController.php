<?php

namespace App\Http\Controllers;

use App\Models\Applogo;
use App\Models\StatusPendaftaran;
use App\Models\User;
use Illuminate\Database\Console\Migrations\StatusCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        $applogo = Applogo::first();

        if (Auth::check()) {
            $user = Auth::user();

            if (empty($user->email)) {
                return redirect('/ppdb/pendaftaran');
            }
        }
        return view('auth.login', compact('applogo'));
    }

    public function showRegisterForm()
    {
        $applogo = Applogo::first();
        return view('auth.register', compact('applogo'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nisn' => 'required|string|unique:users,nisn',
            'password' => 'required|min:8|confirmed',
            'jalur' => 'required|in:zonasi,prestasi,afirmasi',
        ]);

        User::create([
            'name' => $request->name,
            'nisn' => $request->nisn,
            'password' => Hash::make($request->password),
            'jalur' => $request->jalur
        ]);

        return redirect()->route('ppdb.login')->with('success', 'Registrasi berhasil!');
    }

    public function login(Request $request)
    {

        $request->validate([
            'nisn' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('nisn', 'password'))) {
            $request->session()->regenerate();

            return redirect()->intended('/ppdb/pendaftaran')->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'nisn' => 'NISN atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/ppdb/login')->with('success', 'Anda telah logout.');
    }
}
