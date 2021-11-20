<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'location',
        'product_id',
        'description',
    ];

    public function bike(){
        return $this->belongsTo(Product::class);
    }
}
