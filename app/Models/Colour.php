<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Varient;
use App\Models\Bikemodel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Colour extends Model
{
    use HasFactory;

    protected $fillable = [
        'bikemodel_id',
        'varient_id',
        'product_id',
        'colour_name',
        'colour_code',
    ];

     public $timestamps = false;

    public function bike(){
        return $this->belongsTo(Product::class ,'product_id');
    }

    public function varient(){
        return $this->belongsTo(Varient::class,'varient_id' );
    }

    public function model(){
        return $this->belongsTo(Bikemodel::class,'bikemodel_id');
    }
}
