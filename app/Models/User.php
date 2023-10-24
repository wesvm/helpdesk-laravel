<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'first_names', 'last_names', 'username', 'password', 'role', 'in_charge', 'position'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $rules = [
        'username' => 'unique:users,username'
    ];
}
