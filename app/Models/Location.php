<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

        
    protected $fillable = [
        'user_id',
        'district',
        'zone',
        'extension_area',
        'crush',
        'holding_type',
    ];

    public function user(){
        return $this->belongsTo('App\models\User');
    }

}
