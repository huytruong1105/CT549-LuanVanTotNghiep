<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingInformation extends Model
{
    //
    protected $dates = ['created_at', 'updated_at', 'started_date', 'ended_date'];

    // public function graduation_student(){
    //     return $this->belongsTo(GraduationStudent::Class);
    // }

    public function company(){
        return $this->belongsTo(Company::Class);
    }

    public function student(){
        return $this->belongsTo(Student::Class);
    }
}
