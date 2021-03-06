<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table='permissions';

    public function roles()
    {
        return $this->belongsToMany('App\Role','role_permission','permission_id','role_id');
    }
}
