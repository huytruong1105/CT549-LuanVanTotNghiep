<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeroomTeacher extends Model
{
    //

    public function homeroom(){
        return $this->belongsTo(Homeroom::Class);
    }

    public function teacher(){
        return $this->belongsTo(Teacher::Class);
    }
}
