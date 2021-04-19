<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_id',
        'eid',
        'analogue_id',
        'sex',
        'colour',
        'species',
        'breed',
        'age',
        'transfer'
    ];

    
    public function brand() {
        return $this->belongsTo('App\Models\Brand');
    }
}
