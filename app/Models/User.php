<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['login', 'password', 'email'];
    protected $hidden   = ['password'];
}
