<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        "name"
    ];

    public function vehiclemodel(){
        return $this->haMany('App\Models\VehicleModel', "brand_id", "id");
    }

    public function vehicle() {
        return $this->belongsTo('App\Models\Vehicle');
    }
}
