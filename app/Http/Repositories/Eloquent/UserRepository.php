<?php

namespace App\Http\Repositories\Eloquent;

use App\User;
use Illuminate\Support\Facades\DB;

class UserRepository extends EloquentImpl
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll()
    {
        return $this->user->select(['id', 'name', 'email','avatar']);
    }

    public function storeOrUpdate($obj)
    {
        $obj->save();
    }

    public function delete($obj)
    {
        return $obj->delete();
    }

    public function findById($id)
    {
        return $this->user->findOrFail($id);
    }

    public function changePassword($user)
    {
        $user->save();
    }
}
