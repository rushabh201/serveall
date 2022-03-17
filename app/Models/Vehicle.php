<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        "brand_id",
        "model_id",
        "vehicle_registration_number",
        "purchase_date",
        "manufacturing_date",
        "engine_number",
        "chasis_number",
        "insurance_id",
        "insurer_gstin",
        "insurer_address",
        "policy_number",
        "insurance_expiry_date",
        "registration_certificate_img",
        "insurance_img",
    ];
    
    public function image(){
        return $this->belongsToMany('App\Models\Image');
    }

    public function user() {
        return $this->belongToMany('App\Models\User', "vehicle_id");
    }

    public function brand() {
        return $this->hasOne('App\Models\Brand', "id", "brand_id");
    }

    public function vehicle_model() {
        return $this->hasOne('App\Models\VehicleModel', "id", "model_id");
    }

}
