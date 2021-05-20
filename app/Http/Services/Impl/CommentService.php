<?php

namespace App\Http\Services\Impl;

use App\Comment;
use App\Http\Repositories\Eloquent\CommentRepository;
use Illuminate\Support\Facades\Auth;

class CommentService extends ServiceImpl
{
    protected $commentRepo;

    public function __construct(CommentRepository $commentRepo)
    {
        $this->commentRepo = $commentRepo;
    }

    public function getAll()
    {
        return $this->commentRepo->getAll()->sortBy('DESC');
    }

    public function create($post_id, $request)
    {
        $comment = new Comment();
        $comment->post_id = $post_id;
        $comment->user_id = Auth::user()->id;
        $comment->content = $request->content_comment;
        $this->commentRepo->storeOrUpdate($comment);

    }

    public function store($request)
    {
        # code...
    }

    public function update($request, $id)
    {
        $comment = $this->commentRepo->findById($id);
        $comment->content = $request->content_comment;
        $this->commentRepo->storeOrUpdate($comment);
    }

    public function delete($id)
    {
        $comment = $this->findById($id);
        $this->commentRepo->delete($comment);
    }

    public function findById($id)
    {
        return $this->commentRepo->findById($id);
    }

    public function getCommentByPost($post_id)
    {
        return $this->commentRepo->getCommentByPost($post_id)->sortByDesc('id');

    }
}
