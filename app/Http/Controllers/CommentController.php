<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Http\Services\Impl\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService) {
        $this->commentService = $commentService;
    }

    public function store($post_id,Request $request)
    {
        $request->$post_id;
        $this->commentService->create($post_id, $request);
        return back();
    }

    public function destroy($id)
    {
        $this->commentService->delete($id);
        return back();
    }
}
