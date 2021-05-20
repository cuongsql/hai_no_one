<?php


namespace App\Http\Services\Impl;

use App\Http\Repositories\Eloquent\UserRepository;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserService extends ServiceImpl
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getList()
    {
        return $this->userRepository->getAll();
    }

    public function getAll()
    {
        $users = $this->userRepository->getAll();
        return datatables()->of($users)
            ->addIndexColumn()
            ->addColumn('avatar', function ($user) {
                $url = asset("storage/" . $user->avatar);
                return '<img src=' . $url . ' border="0" width="60" class="img-rounded" align="center" />';
            })
            ->addColumn('action', function ($row) {
                $button = '<a href="' . route('admin.user.show', $row->id) . ' "
                              data-toggle="tooltip" data-original-title="Permission"
                              class="btn btn-info permission-uer">Permission</a>';
                $button .= '<a href="javascript:void(0);" id="delete-user" data-toggle="tooltip"
                                   data-original-title="Delete" data-id="' . $row->id . '"
                                   class="delete btn btn-danger ml-3">Delete</a>';
                return $button;
            })
            ->rawColumns(['action', 'avatar'])
            ->make(true);
    }

    public function store($request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->avatar = $this->upload($request);
        $user->password = Hash::make($request->password);
        $this->userRepository->storeOrUpdate($user);
    }

    public function update($request, $id)
    {
        $user = $this->findById($id);
        if (!$request->hasFile('image')) {
            $image = $user->avatar;
        } else {
            if ($user->avatar != 'images/no_avatar.png' && $user->avatar != 'images/no_image.png') {
                Storage::delete('public/' . $user->avatar);
            }
            $image = $this->upload($request);
        }
        $user->fill($request->all());
        $user->avatar = $image;
        $this->userRepository->storeOrUpdate($user);
    }

    public function delete($id)
    {
        $user = $this->findById($id);
        if ($user->avatar != 'images/no_avatar.png') {
            Storage::delete('public/' . $user->avatar);
        }
        $this->userRepository->delete($user);
        return response()->json(['success' => 'User deleted successfully.']);

    }

    public function findById($id)
    {
        return $this->userRepository->findById($id);
    }

    public function search($request)
    {
        return $this->userRepository->search($request->search);
    }

    public function update_password($request, $id)
    {
        $user = $this->findById($id);
        $current = Auth::user()->password;
        if (Hash::check($request->old_password, $current)) {
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            $this->userRepository->changePassword($user);
        }
    }
}
