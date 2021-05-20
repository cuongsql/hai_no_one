<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends PostController
{

    public function like($id)
    {
            $like = new Like();
            if (!Auth::user()){
                    echo "<script>alert('bạn cần đăng nhập để like bài viết')</script>";
                    return redirect()->route('login');
            }
            $user_id = Auth::user()->id;
            $post_id = $id;
            foreach ($like->all() as $like) {
                if ($like->user_id == $user_id && $like->post_id==$post_id) {
                    $like->delete();
                    return  back();
                }
            }
            $this->saveLike($user_id,$post_id);
            return back();
    }

    public function saveLike($user_id,$post_id)
    {
        $like=new Like();
        $like->user_id = $user_id;
        $like->post_id = $post_id;
        $like->like = 1;
        $like->dislike = 0;
        $like->save();
    }
}
