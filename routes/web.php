<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DestinasiController,
    ApiCBController,
    AuthController,
    KulinerController,
    Oleh2Controller,
    BudayaController,
    StaycationController,
    EdukasiController,
    WisataAlamController,
    HomeController,
    MapController,
    GoogleController,
    GeminiController,
    AdminController
};

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::view('/', 'welcome')->name('home');
Route::get('/destinasi', [DestinasiController::class, 'index']);
Route::get('/peta', [MapController::class, 'index'])->name('peta');

// Chatbot API
Route::post('/chatbot', [ApiCBController::class, 'handleRequest']);
Route::get('/chatbot1', fn() => "Chatbot endpoint aktif. Gunakan POST untuk mengirim pesan.");
Route::post('/ask-gemini', [GeminiController::class, 'ask'])->name('ask-gemini');

// Google OAuth
Route::prefix('auth/google')->group(function () {
    Route::get('/', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');
});

/*
|--------------------------------------------------------------------------
| Guest Only Routes (Register & Login)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::view('/register', 'register')->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::view('/login', 'login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Wisata Categories
    Route::get('/kuliner', [KulinerController::class, 'index'])->name('kuliner');
    Route::get('/oleh', [Oleh2Controller::class, 'index'])->name('oleh');
    Route::get('/budaya', [BudayaController::class, 'index'])->name('budaya');
    Route::get('/staycation', [StaycationController::class, 'index'])->name('staycation.index');
    Route::get('/edukasi', [EdukasiController::class, 'index'])->name('edukasi');
    Route::get('/alam', [WisataAlamController::class, 'index'])->name('alam');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // User Management
    Route::get('/users', [AdminController::class, 'userIndex'])->name('admin.users.index');
    Route::get('/users/create', [AdminController::class, 'userCreate'])->name('admin.users.create');
    Route::post('/users', [AdminController::class, 'userStore'])->name('admin.users.store');
    Route::delete('/users/{user}', [AdminController::class, 'userDestroy'])->name('admin.users.destroy');
    
    // Content Management
    Route::resource('destinasi', DestinasiController::class)->except(['show']);
});

/*
|--------------------------------------------------------------------------
| Testing Routes
|--------------------------------------------------------------------------
*/
Route::get('/testing', fn() => "Test Route is Working!")->name('testing');