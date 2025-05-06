<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Fungsi Registrasi
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Membuat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Password di-hash
        ]);

        // Login otomatis setelah registrasi (opsional)
        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Registrasi sukses! Selamat datang.');
    }

    // Fungsi Login
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate(); // penting agar sesi aman
        return redirect()->intended('/dashboard');
    }

    return back()->withErrors([
        'email' => 'Email atau Password salah!',
    ]);
}


    // Fungsi Logout
    public function logout(Request $request)
    {
        Auth::logout(); // Logout user
        $request->session()->invalidate(); // Hapus session
        $request->session()->regenerateToken(); // Regenerasi token CSRF
        return redirect('/login');
    }
}
