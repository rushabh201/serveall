<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    
    protected $guard_name = 'web'; 

    // our user table columns
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'address',
        'state',
        'city',
        'profile_image',
        'gst_number',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function image()
    {
    	return $this->hasMany('App\Models\Image','profile_image','name');
    }

    public function vehicle()
    {
    	return $this->hasMany('App\Models\Vehicle');
    }

    public function cities()
    {
        return $this->hasOne('App\Models\City', "id", "city");
    }

    public function states()
    {
        return $this->hasOne('App\Models\State', "id", "state");
    }
}
