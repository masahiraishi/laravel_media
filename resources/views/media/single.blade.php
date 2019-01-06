@extends('layouts.default')
@section('content')

    <div class="col-xs-8 col-xs-offset-2">
        <h2>タイトル:&nbsp;{{$post->title}}
            <small>投稿日:&nbsp;{{date("Y年 m月 d日",strtotime($post->created_at))}}</small>
        </h2>
        <p>カテゴリー:&nbsp;{{$post->category->name}}</p>
        <p>{{$post->content}}</p>
        <div class="">
            <img src="{{$post->photo->path}}" height="100">
        </div>
        <hr>
        {{--コメントが存在すれば--}}
        @if(count($post->comments)>0)
            <h3>コメント一覧</h3>
            @foreach($post->comments as $single_comment)
                <h4>{{$single_comment->commenter}}</h4>
                <p>{{$single_comment->comment}}</p><br>
            @endforeach
            {{--{{$post_paginate->links()}}--}}
        @endif


        <h3>コメントを投稿</h3>
        {{--コメント投稿完了でメッセージ--}}
        @if(Session::has('message'))
            <div class="bg-info">
                <p>{{ Session::get('message') }}</p>
            </div>
        @endif

        {{--エラーメッセージ--}}
        @foreach($errors->all() as $message)
            <p class="bg-danger">{{$message}}</p>
        @endforeach

        {{--コメント投稿--}}
        <form action="/comment" class="form" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="commenter" class="">名前</label>
                <div class="">
                    <input type="text" name="commenter" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="comment" class="">コメント</label>
                <div class="">
                    <textarea name="comment" class="form-control"></textarea>
                </div>
                <input type="hidden" name="post_id" class="" value="{{$post->id}}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">投稿する</button>
            </div>
        </form>
    </div>
@endsection