<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bikemodel;

class Brochure extends Model
{
    use HasFactory;
    protected $fillable = [
        'model_id',
        'file',
    ];

    public $timestamps = false;

    public function brand(){
        return $this->belongsTo(Bikemodel::class);
    }
}
