<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEvent extends Model
{
    
    public function user(){
        return $this->belongsTo(User::Class);
    }
    public function event(){
        return $this->belongsTo(Event::Class);
    }
}
