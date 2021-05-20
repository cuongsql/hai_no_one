<?php

namespace App\Http\Repositories\Eloquent;

use App\Post;

class PostRepository extends EloquentImpl
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function getAll()
    {
        return $this->post->all();
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
        return $this->post->findOrFail($id);
    }

    public function search($keyword)
    {
        return $this->post->where('title', 'LIKE', '%' . $keyword . '%')->get();
    }
}
