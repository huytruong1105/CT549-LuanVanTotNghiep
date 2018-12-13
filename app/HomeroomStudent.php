<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeroomStudent extends Model
{
    //
    public function homeroom(){
        return $this->belongsTo(Homeroom::Class);
    }
    public function student(){
        return $this->belongsTo(Student::Class);
    }
}
