<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function state(){
        return $this->belongTo('App\Models\State', 'state_id' );
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
