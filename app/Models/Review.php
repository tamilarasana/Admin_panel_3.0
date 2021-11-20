<?php

namespace App\Models;

use App\Models\Bikemodel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'product_id',
        'star',
        'description',
        'verified',
    ];

    public function model(){
        return $this->belongsTo(Bikemodel::class);
    }
}
