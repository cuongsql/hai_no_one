<?php

namespace App\Http\Controllers;

use App\Role;
use App\User_Role;
use Illuminate\Http\Request;

class RoleController extends UserController
{
    public function role(Request $request, $id)
    {
        $user = $this->findById($id);
        foreach ($user->user_roles as $item) {
            User_Role::destroy($item->id);
        }
        foreach ($this->getAllRole() as $role) {
            if ($request->get($role->role)) {
                $this->permission($request->get($role->role), $id);
            }
        }
        return redirect()->route('admin.user.index');
    }

    public function permission($permission, $id)
    {
        $user_role = new User_Role();
        $user_role->user_id = $id;
        $user_role->role_id = $permission;
        $user_role->save();
    }

    public function showUser(UserController $userController, Request $request, $id)
    {
        $roles = $this->getAllRole();
        $user = $userController->findById($id);
        $user->user_roles;
        return view('admin.user.show', compact('user', 'roles'));
    }

    public function getAllRole()
    {
        $role = new Role();
        return $role->all();
    }
}
