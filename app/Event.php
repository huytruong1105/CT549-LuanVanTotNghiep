<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function users(){
        return $this->belongsTo(User::Class);
    }
    
    public function user_event(){
        return $this->hasMany(UserEvent::Class);
    }
}
