<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    public function homeroomTeacher(){
        return $this->hasMany(HomeroomTeacher::Class);
    }
    public function department(){
        return $this->belongsTo(Department::Class);
    }
    public function user(){
        return $this->hasOne(User::Class);
    }
}
