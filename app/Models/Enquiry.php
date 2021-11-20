<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'product',
        'name',
        'phone',
        'email',
        'description',
    ];

    public function bike(){
        return $this->belongsTo(Product::class);
    }
}
