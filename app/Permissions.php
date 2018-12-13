<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    public function user_permissions(){
        return $this->hasMany(UserPermission::Class);
    }
}
