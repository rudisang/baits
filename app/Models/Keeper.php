<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keeper extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'valid_until',
        'type',

    ];

    public function users() {
        return $this->hasMany('App\Models\User');
    }
}
