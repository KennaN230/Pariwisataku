<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime'];

    // ⚠️ Optional: remove this if you hash password in controller
    // public function setPasswordAttribute($password)
    // {
    //     if (!empty($password)) {
    //         $this->attributes['password'] = bcrypt($password);
    //     }
    // }
}
