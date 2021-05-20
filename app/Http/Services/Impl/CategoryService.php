<?php


namespace App\Http\Services\Impl;

use App\Category;
use App\Http\Repositories\Eloquent\CategoryRepository;
use Illuminate\Support\Facades\Storage;

class CategoryService extends ServiceImpl
{
    protected $categoryRepo;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function getAll()
    {
        $categories = $this->categoryRepo->getAll();
        return datatables()->of($categories)
            ->addIndexColumn()
            ->addColumn('total post', function ($categories){
                return $categories->posts->count();
            })
            ->addColumn('action', function ($row) {
                $button = '<a href="' . route('admin.category.edit', $row->id) . '"
                              data-toggle="tooltip" data-original-title="Edit"
                              class="edit btn btn-primary edit-category">Edit</a>';
                $button .= '
                <a href="javascript:void(0);" id="delete-category" data-toggle="tooltip"
                   data-original-title="Delete" data-id="' . $row->id . '"
                   class="delete btn btn-danger ml-3">Delete</a>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store($request)
    {
        $category = new Category();
        $category->fill($request->all());
        $this->categoryRepo->storeOrUpdate($category);
    }

    public function update($request, $id)
    {
        $category = $this->categoryRepo->findById($id);
        $category->fill($request->all());
        $this->categoryRepo->storeOrUpdate($category);
    }

    public function delete($id)
    {
        $category = $this->findById($id);
        $this->categoryRepo->delete($category);
    }

    public function findById($id)
    {
        return $this->categoryRepo->findById($id);
    }

    public function search($request)
    {
        $keyword = $request->keyword;
        return $this->categoryRepo->search($keyword);
    }

}
