<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveySession extends Model
{
    public function survey(){
        return $this->hasMany(Survey::Class);
    }
}
