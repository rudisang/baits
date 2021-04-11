<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferRequest extends Model
{
    use HasFactory;

    protected $fillable = [
      'eid',
      'from_id',
      'to_id',
      'old_brand',
      'old_brand_shape',
      'status',
      'affidavit',
      'omang',
      'other_docs',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
