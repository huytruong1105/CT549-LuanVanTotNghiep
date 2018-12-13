<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    public function homeroom()
    {
        return $this->hasMany(Homeroom::Class);
    }

    public function major(){
        return $this->belongsTo(Major::Class);
    }
}
