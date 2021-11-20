<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Category;
use App\Models\Bikemodel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Varient extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'bikemodel_id',
        'title',
        'description',
        'status',
    ];
    
    public $timestamps = false;

    public function brand(){
        return $this->belongsTo(Category::class ,'category_id');
    }

    public function model(){
        return $this->belongsTo(Bikemodel::class, 'bikemodel_id');
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
