<?php

namespace App\Http\Services\Impl;

use App\Category;
use App\Http\Repositories\Eloquent\PostRepository;
use App\Post;
use App\Post_Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostService extends ServiceImpl
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    function getAll()
    {
        return $this->postRepository->getAll();
    }

    public function store($request)
    {
        $post = new Post();
        $post->content = $this->upload($request);
        $post->user_id = Auth::user()->id;
        $this->createOrUpdatePostFromRequest($request, $post);
    }

    public function update($request, $id)
    {
        $post = $this->findById($id);
        $post->content = $this->upload($request);
        $post->user_id = Auth::user()->id;
        $this->createOrUpdatePostFromRequest($request, $post);
    }

    public function delete($id)
    {
        $post = $this->findById($id);
        $this->postRepository->delete($post);
    }

    public function findById($id)
    {
        return $this->postRepository->findById($id);
    }

    public function search($request)
    {
        $keyword = $request->search;
        return $this->postRepository->search($keyword);
    }

    public function createOrUpdatePostFromRequest($request, $post)
    {

        $post->fill($request->all());
        $this->postRepository->storeOrUpdate($post);

        $categories=Category::all();
        $post_id=DB::table('posts')->max('id');
        foreach ($categories as $category){
            if ($request->get($category->id)){
                $post_category=new Post_Category();
                $post_category->post_id= $post_id;
                $post_category->category_id=$category->id;
                $post_category->save();
            }
        }
    }

    public function getList()
    {
        $posts = $this->postRepository->getAll();
        return datatables()->of($posts)
            ->addIndexColumn()
            ->addColumn('user', function ($post){
                return '<p> ' . $post->user->name .' </p>';
            })
            ->addColumn('category', function ($posts){
                $p = '';
                foreach ($posts->categories as $category ){
                    $p.=  $category->name ." / " ;
                }
                return $p;

            })
            ->addColumn('title', function ($post){
                return '<p>'.$post->title.'</p>';
            })
            ->addColumn('content', function ($post) {
                $url = asset("storage/" . $post->content);
                return '<img src=' . $url . ' border="0" width="60" class="img-rounded" align="center" />';
            })
            ->addColumn('action', function ($row) {
                return '<a href="' . route('admin.post.destroy', $row->id) . ' "
                              data-toggle="tooltip"
                              class="btn btn-info post-delete">Delete</a>';

            })
            ->rawColumns(['action','content','user', 'title'])
            ->make(true);
    }
}
