<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductSeason extends Model
{
    use HasFactory;

    protected $table = 'product_season';
    protected $fillable = [
        'product_id',
        'season_id',
    ];

    public $timestamps = false;

    public function seasons(){
        return $this->belongsToMany(Season::class, 'seasons','season_id');
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'products','product_id');
    }
}
