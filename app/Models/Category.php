<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Bikemodel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_name',
        'brand_logo',
        'about_brand',
        'status',
    ];

    public $timestamps = false;

    public function models(){
        return $this->hasMany(Bikemodel::class, 'category_id');
    }

    public function bikes(){
        return $this->hasMany(Product::class);
    }
}
