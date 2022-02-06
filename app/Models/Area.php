<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    public function addresses()
    {
        return $this->hasMany('App\Models\Address');
    }

    public function users()
    {
        return $this->hasManyThrough(User::class, Address::class);
    }
}
