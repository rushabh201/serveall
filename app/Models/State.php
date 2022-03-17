<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    public function city(){
        return $this->hasMany('App\Models\City');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
