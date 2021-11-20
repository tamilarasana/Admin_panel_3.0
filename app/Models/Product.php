<?php

namespace App\Models;

use App\Models\Spec;
use App\Models\Image;
use App\Models\Trial;
use App\Models\Colour;
use App\Models\Review;
use App\Models\Enquiry;
use App\Models\Varient;
use App\Models\Category;
use App\Models\Bikemodel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'about_bike',
        'category_id',
        'bikemodel_id',
        'varient_id',
        'price',
        'route',
        'description',
        'image',
    ];

    public function brand(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function model(){
        return $this->belongsTo(Bikemodel::class,'bikemodel_id');
    }

    public function varient(){
        return $this->belongsTo(Varient::class,'varient_id');
    }

    public function colors(){
        return $this->hasMany(Colour::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function trials(){
        return $this->hasMany(Trial::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function enquiries(){
        return $this->hasMany(Enquiry::class);
    }

    public function specs(){
        return $this->hasMany(Spec::class);
    }


}
