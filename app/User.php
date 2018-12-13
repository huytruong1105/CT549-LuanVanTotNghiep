<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    // public function graduation_student(){
    //     return $this->belongsTo(GraduationStudent::Class);
    // }

    public function student(){
        return $this->belongsTo(Student::Class);
    }
    public function teacher(){
        return $this->belongsTo(Teacher::Class);
    }
    public function post(){
        return $this->hasMany(Post::Class);
    }
    public function event(){
        return $this->hasMany(Event::Class);
    }
    public function user_permission(){
        return $this->hasMany(UserPermission::Class);
    }
    public function user_event(){
        return $this->hasMany(UserEvent::Class);
    }
    public function minority(){
        return $this->belongsTo(Minority::Class);
    }
    public function district(){
        return $this->belongsTo(District::Class);
    }
}
