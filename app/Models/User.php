<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'first_names', 'last_names', 'username', 'password', 'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $rules = [
        'dni' => 'unique:users,dni',
        'username' => 'unique:users,username'
    ];
}
