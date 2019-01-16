<?php

namespace App\Http\Controllers;

use Validator;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class CommentsController extends Controller
{
    //    validationの設定
    public function store(Request $request)
    {

//        validationは、modelにて
        $this->validate($request,Comment::$rules);
//      インスタンスの生成
        $comment = new Comment;
        $comment->commenter = $request->commenter;
        $comment->comment = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->email = "xyz@gmail.com";
        $comment->approved = 0;
        $comment->save();

//コメント回数
//        $post = new Post;
        $post = Post::find($request->post_id);
        $post->comment_count = $post->comment_count + 1;
        $post->save();
        return back()
            ->with('message','投稿が完了しました')
            ->withInput();
    }
}


