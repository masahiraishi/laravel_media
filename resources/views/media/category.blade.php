@extends('layouts.default')

@section('content')
    <div class="col-xs-8 col-xs-offset-2">
        <h1>カテゴリ：{{$category_title->name}}</h1>
        @foreach($category_posts as $category_post)
            <h2>タイトル：{{$category_post->title}}
                <small>投稿日:&nbsp;{{date("Y年 m月 d日",strtotime($category_post->created_at))}}</small>
            </h2>
            <p>{{$category_post->content}}</p>
            <p><a href="{{url('media',$category_post->id)}}" class="btn btn-primary">続きを読む</a></p>
            <p>コメント数：{{$category_post->comment_count}}</p>
        @endforeach
        {{$category_posts->links()}}

    </div>
@endsection