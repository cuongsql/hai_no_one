<?php
namespace App\Http\Repositories\Eloquent;

use App\Comment;

class CommentRepository extends EloquentImpl
{
    protected $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function getAll()
    {
        return $this->comment->all();
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
        return $this->comment->findOrFail($id);
    }

    public function getCommentByPost($post_id)
    {
        return $this->comment->where('post_id',$post_id)->get();
    }
}
