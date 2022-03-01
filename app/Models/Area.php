<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use HasFactory, SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'city',
        'country'
    ];

    public function addresses()
    {
        return $this->hasMany('App\Models\Address');
    }

    public function users()
    {
        return $this->hasManyThrough(User::class, Address::class);
    }
}
