<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostsController extends Controller
{
    //投稿記事一覧
    public function index()
    {
        $posts = Post::all();
        return view('media.index',['posts'=>$posts]);
    }

//    記事詳細
    public function show($id)
    {
        $post = Post::find($id);
        return view('media.single',['post'=>$post]);
    }

}
