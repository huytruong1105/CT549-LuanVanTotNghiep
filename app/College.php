<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    //
    public function department() 
    {
        return $this->hasMany(Department::Class);
    }
}
