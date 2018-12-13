<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    public function department()
    {
        return $this->belongsTo(Department::Class);
    }

    // public function homeroom()
    // {
    //     return $this->hasMany(Homeroom::Class);
    // }
    
    public function speciality(){
        return $this->hasMany(Speciality::Class);
    }
}
