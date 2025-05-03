<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
                // Password dummy karena Google login tidak memerlukan password
                'password' => encrypt('passworddummy')
            ]
        );

        // Login user
        Auth::login($user);

        // Redirect ke dashboard setelah login
        return redirect('/dashboard');
    }
}
