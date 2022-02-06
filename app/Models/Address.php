<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes;

    
    public function user()
    {
        return $this->hasOne('App\Models\User');
    }
    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }
}
