<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerSample extends Model
{
    public function question(){
        return $this->belongsTo(Question::Class);
    }


}
