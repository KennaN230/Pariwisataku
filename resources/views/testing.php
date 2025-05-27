<?php

use Illuminate\Support\Facades\Hash;

Route::get('/cek-hash', function () {
    $plain = 'Aditya123';
    $hash = '$2y$12$fg8bWCeFf6SQjrI57/WRnueHDySuNyaY//McLha667e9f1nKliAe.';
    
    $result = Hash::check($plain, $hash);
    dd($result); // true atau false
});
