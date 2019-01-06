<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Photo;

class PostsController extends Controller
{
    //投稿記事一覧
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')
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

//    記事新規投稿
    public function storeBlog(Request $request)
    {
//        バリデーションの設定
        $params = $this->Validate($request,Post::$rules);

        $file = $params['image'];
        $image = \Image::make(file_get_contents($file->getRealPath()));
        $image->save(public_path().'/images/'.$file->hashName());

        $photo = new Photo;
        $photo->path = '/images/'.$file->hashName();
        $photo->save();

        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->contents;
        $post->author_id = 0; // ひとまず
        $post->cat_id = $request->cat_id;
        $post->photo_id = $photo->id; // photo_id
        $post->comment_count = 0; // 初期値
        $post->save();

        return back()->with('message','投稿が完了しました');
    }

}
