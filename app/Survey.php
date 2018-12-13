<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    // public function graduation_student(){
    //     return $this->belongsTo(GraduationStudent::Class);
    // }

    public function question(){
        return $this->belongsTo(Question::Class);
    }

    public function student(){
        return $this->belongsTo(Student::Class);
    }
    public function survey_session(){
        return $this->belongsTo(SurveySession::Class);
    }
}
