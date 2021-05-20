<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Services\Impl\CategoryService;
use App\Http\Services\Impl\PostService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;
    protected $postService;

    public function __construct(CategoryService $categoryService, PostService $postService)
    {
        $this->categoryService = $categoryService;
        $this->postService = $postService;
    }

    public function getList()
    {
        return $this->categoryService->getAll();

    }

    public function index()
    {
        return view('admin.category.list');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CreateCategoryRequest $request)
    {
        $this->categoryService->store($request);
        return redirect()->route('admin.category.index');
    }

    public function edit($id)
    {
        $category = $this->categoryService->findById($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(CreateCategoryRequest $request, $id)
    {
        $this->categoryService->update($request, $id);
        return redirect()->route('admin.category.index');
    }

    public function destroy($id)
    {
        $this->categoryService->delete($id);
        return redirect()->route('admin.category.index');
    }
}
