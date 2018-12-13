<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function work_informations(){
        return $this->hasMany(WorkingInformation::Class);
    }

    public function district(){
    	return $this->belongsTo(District::Class);
    }
}
