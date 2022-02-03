<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    
    public function user()
    {
        return $this->hasOne('App\Models\User');
    }
    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }
}
