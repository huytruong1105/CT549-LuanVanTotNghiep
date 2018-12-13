<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //

    public function college() 
    {
        return $this->belongsto(College::Class);
    }

    public function majors() 
    {
        return $this->hasMany(Major::Class);
    }

    public function teacher()
    {
        return $this->hasMany(Teacher::Class);
    }
}
