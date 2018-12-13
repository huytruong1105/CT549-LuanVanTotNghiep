<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function city(){
        return $this->belongsTo(City::Class);
    }
    //
    public function users(){
        return $this->hasMany(User::Class);
    }
    public function company(){
    	return $this->hasMany(Company::Class);
    }
}
