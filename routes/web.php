<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\ApiCBController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleController;  // <-- Tambahkan controller Google

// Home page
Route::get('/', function () {
    return view('welcome');
});

// Dashboard page (butuh auth)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

// API destinasi wisata (GET data destinasi)
Route::get('/destinasi', [DestinasiController::class, 'index']);

// Chatbot API (POST untuk kirim pesan ke ChatGPT)
Route::post('/chatbot', [ApiCBController::class, 'handleRequest']);

// Untuk cek endpoint chatbot
Route::get('/chatbot1', function () {
    return "Chatbot endpoint aktif. Gunakan POST untuk mengirim pesan.";
});

// Register
Route::get('/register', function () {
    return view('register');
});
Route::post('/register', [AuthController::class, 'register']);

// Login (menggunakan email/password)
Route::get('/login', function () {
    return view('login');
})->name('login');

// Proses login (menggunakan email/password)
Route::post('/login', [AuthController::class, 'login']);

// Google Login - Redirect ke Google
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle']);  // <-- Pindahkan ke controller

// Google Login - Callback setelah login dari Google
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']); // <-- Pindahkan ke controller

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
