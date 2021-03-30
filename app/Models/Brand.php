<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'shape',
        'brand',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
