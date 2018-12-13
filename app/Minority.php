<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Minority extends Model
{
    public function users(){
        return $this->hasMany(User::Class);
    }
}
