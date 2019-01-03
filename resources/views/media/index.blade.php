@extends('layouts.default')

@section('content')
    <div class="col-xs-8 col-xs-offset-2">
        <a href="media/create" class="btn btn-success pull-right">記事を新しく登録する</a>
        @foreach($posts as $post)

            <h2>タイトル:&nbsp;{{$post->title}}
                <small>投稿日:&nbsp;{{date("Y年 m月 d日",strtotime($post->created_at))}}</small>
            </h2>
            <p>カテゴリー:&nbsp;<a href="{{url('media/category',$post->category->id)}}">{{$post->category->name}}</a></p>
            <p>{{$post->content}}</p>
            <p><a href="{{url('media',$post->id)}}" class="btn btn-primary">続きを読む</a></p>
            <p>コメント数:&nbsp;{{$post->comment_count}}</p>
        @endforeach
                {{--{{$posts->links()}}--}}
    </div>
@endsection
