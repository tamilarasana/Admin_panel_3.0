<?php

namespace App\Models;

use App\Models\Varient;
use App\Models\Specname;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Spec extends Model
{
    use HasFactory;

    protected $fillable = [
        'specname_id',
        'specname',
        'varient_id',
        'value',
        'status',
    ];
    public $timestamps = false;

    public function bike(){
        return $this->belongsTo(Varient::class);
    }

    public function specName(){
        return $this->belongsTo(Specname::class, 'specname_id','id');
    }
}
