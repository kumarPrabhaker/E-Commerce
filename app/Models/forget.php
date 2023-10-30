<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forget extends Model
{
    use HasFactory;
    
    protected $table = 'forgettable';

  
    protected $fillable = [
        'email', // Add other fields as needed
    ];

}
