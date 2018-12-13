<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function survey(){
        return $this->hasMany(Survey::Class);
    }

    public function answer_sample(){
        return $this->hasMany(AnswerSample::Class);
    }
}
