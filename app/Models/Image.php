<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
    ];

    public function user(){
        return $this->hasMany('App\Models\User','profile_image','name');
    }

    public function vehicle(){
        return $this->belongsToMany('App\Models\Vehicle');
    }

}
