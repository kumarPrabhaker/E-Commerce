<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class login extends Model
{
    use HasFactory;

    protected $table = 'logintable';
    protected $fillable = [
        'username', // Add other fields as needed
        'password'
    ];
}
