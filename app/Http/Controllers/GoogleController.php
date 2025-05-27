<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    // Redirect ke Google OAuth
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle callback dari Google
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        // Cek apakah user sudah ada di database
        // GoogleController.php
        $user = User::updateOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
                // Jangan kosongkan password, isi dengan random string untuk mencegah login manual jika akun hanya untuk Google
                'password' => Hash::make(Str::random(24)),
            ]
        );

        // Login user
        Auth::login($user);

        // Redirect ke dashboard setelah login
        return redirect('/dashboard');
    }
}
