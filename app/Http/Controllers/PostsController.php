<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    //投稿記事一覧
    public function index()
    {
        $posts = Post::orderBy('created_at','asc')
            ->paginate(5);
        return view('media.index',['posts'=>$posts]);
    }

//    記事詳細
    public function show($id)
    {
        $post = Post::find($id);
        return view('media.single',['post'=>$post]);
    }

    public function create()
    {
        return view('media.create');
    }

    public function sotreBlog(Request $request)
    {
//        バリデーションの設定
        $this->Validate($request,Post::$rules);

        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->contents;
        $post->author_id = 0; // ひとまず
        $post->cat_id = $request->cat_id;
        $post->comment_count = 0; // 初期値
        $post->save();

        return back()->with('message','投稿が完了しました');
    }

}
