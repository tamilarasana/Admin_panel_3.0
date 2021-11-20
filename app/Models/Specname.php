<?php

namespace App\Models;

use App\Models\Spec;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specname extends Model
{
    use HasFactory;

    protected $fillable = [
        'specname',
        'status',
    ];

    public $timestamps = false;
    public function specs(){
        return $this->hasMany(Spec::class);
    }
}
