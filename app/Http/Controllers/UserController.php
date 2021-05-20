<?php

namespace App\Http\Controllers;

use App\Http\Services\Impl\PostService;
use App\Http\Services\Impl\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    protected $postService;

    public function __construct(UserService $userService, PostService $postService)
    {
        $this->userService = $userService;
        $this->postService = $postService;
    }

    public function index()
    {
        return view('admin.user.list');
    }

    public function getList()
    {
        return $this->userService->getAll();
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function findById($id)
    {
        return $this->userService->findById($id);
    }

    public function store(Request $request)
    {
        $this->userService->store($request);
        return redirect()->route('admin.user.index');
    }

    public function edit($id)
    {
        $user = $this->userService->findById($id);
        return view('blog.edit-profile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->userService->update($request, $id);
        return redirect('/user/' . $id . '/profile');
    }

    public function destroy($id)
    {
        return $this->userService->delete($id);
    }

    public function show($id)
    {
        $user = $this->userService->findById($id);
        $posts = $user->posts->all();
        return view('blog.profile', compact('user', 'posts'));
    }

    public function change_password($id)
    {
        $user = $this->findById($id);
        return view('blog.change_password', compact('user'));
    }

    public function update_password(Request $request, $id)
    {
        $this->userService->update_password($request, $id);
        return redirect()->route('user.profile', $id);
    }

    public function leftmenu()
    {
        $users = $this->userService->getList();
        return view('core.leftmenu', compact('users'));
    }

}
