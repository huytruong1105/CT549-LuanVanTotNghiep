<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function homeroom_student(){
        return $this->hasMany(HomeroomStudent::Class);
    }

    public function working_information(){
        return $this->hasMany(WorkingInformation::Class);
    }

    public function user(){
        return $this->hasOne(User::Class);
    }

    public function survey(){
        return $this->hasMany(Survey::Class);
    }
}
