<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'contact',
        'password',
        'avatar',
        'token',
    ];

    protected $hidden = [
        'password',
        'token',
    ];
}
