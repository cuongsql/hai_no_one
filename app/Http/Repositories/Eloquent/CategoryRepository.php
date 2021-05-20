<?php

namespace App\Http\Repositories\Eloquent;

use App\Category;

class CategoryRepository extends EloquentImpl
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getAll()
    {
        return $this->category->select(['id', 'name', 'description']);
    }

    public function storeOrUpdate($obj)
    {
        $obj->save();
    }

    public function delete($obj)
    {
        $obj->delete();
    }

    public function findById($id)
    {
        return $this->category->findOrFail($id);
    }

    public function search($keyword)
    {
        return $this->category->where('name', 'LIKE', '%' . $keyword . '%');
    }
}
