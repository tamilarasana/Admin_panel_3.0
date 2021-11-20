<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'location',
        'phone',
        'location',
        'email',
        'remarks',
    ];
    
}
