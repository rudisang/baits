<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permit extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'from',
        'to',
        'location_origin',
        'location_destination',
        'is_interzonal',
        'omang',
        'affidavit',
        'other_docs',
        'animal',
        'status',
        'validity',
    ];


 public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
