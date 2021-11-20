<?php

namespace App\Models;

use App\Models\Colour;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bikemodel extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'seo_title',
        'seo_tag',
        'seo_desc',
        'description',
        'file',
    ];

    public $timestamps = false;

    public function brand(){
        return $this->belongsTo(Category::class , 'category_id', 'id');
    }

    public function bikes(){
        return $this->hasMany(Product::class);
    }

    public function colours(){
        return $this->hasMany(Colour::class);
    }
}
