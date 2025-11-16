<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

// app/Models/User.php
protected $fillable = [
    'name',
    'email',
    'password',
    'role',
];


public function store()
{
    return $this->hasOne(Store::class);
}



public function roleIs($role) {
    return $this->role === $role;
}
public function notifications()
{
    return $this->hasMany(Notification::class);
}

    
}

