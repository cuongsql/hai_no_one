<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreatePostRequest;
use App\Http\Services\Impl\CategoryService;
use App\Http\Services\Impl\CommentService;
use App\Http\Services\Impl\PostService;
use App\Http\Services\Impl\UserService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;
    protected $userService;
    protected $commentService;
    protected $categoryService;

    public function __construct(PostService $postService, UserService $userService, CommentService $commentService, CategoryService $categoryService)
    {
        $this->postService = $postService;
        $this->userService = $userService;
        $this->commentService = $commentService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $posts = $this->postService->getAll();
        return view('home', compact('posts'));
    }

    public function post($id)
    {
        $post = $this->postService->findById($id);
        $comments = $this->commentService->getCommentByPost($id);
        return view('blog.content', compact('post', 'comments'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('blog.create', compact('categories'));
    }

    public function store(CreatePostRequest $request)
    {
        $this->postService->store($request);
        return redirect()->route('home');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $post = $this->postService->findById($id);
        return view('blog.edit', compact('post', 'categories'));
    }

    public function update(CreatePostRequest $request, $id)
    {
        $this->postService->update($request, $id);
        return redirect()->route('home');
    }

    public function destroy($id)
    {
        $this->postService->delete($id);
        return redirect()->route('admin.post.index');
    }

    public function getList()
    {
        return $this->postService->getList();
    }

    public function listPost()
    {
        return view('admin.post.list');
    }

    public function search(Request $request)
    {
        $posts = $this->postService->search($request);
        return view('home', compact('posts'));
    }
}
