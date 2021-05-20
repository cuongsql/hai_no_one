<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table='roles';

    public function users()
    {
        return $this->belongsToMany('App\User','user_role','user_id','role_id');
    }

   public function user_roles()
   {
       return $this->hasMany('App\User_Role');
   }
}
