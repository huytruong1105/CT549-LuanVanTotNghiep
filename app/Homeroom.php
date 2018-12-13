<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homeroom extends Model
{
    protected $table = 'homeroom';

    public function speciality(){
        return $this->belongsTo(Speciality::Class);
    }

    public function homeroomteacher(){
        return $this->hasMany(HomeroomTeacher::Class);
    }

    public function posts(){
        return $this->hasMany(Post::Class);
    }

    // public function graduation_student(){
    //     return $this->hasMany(GrduationStudent::Class);
    // }

    public function homeroomstudent(){
        return $this->hasMany(HomeroomStudent::Class);
    }
}
