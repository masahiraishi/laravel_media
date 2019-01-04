@extends($layoutView)

@section('title', $class)

@section('content')
    <a href="media/create" class="btn btn-success pull-right">記事を新しく登録する</a>

    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover">
                <span>記事一覧表示</span>
                @foreach($posts as $post)
                    <tr>
                        <td>
                            <h3>タイトル:&nbsp;{{$post->title}}
                            <small>投稿日:&nbsp;{{date("Y年 m月 d日",strtotime($post->created_at))}}</small>
                            </h3>
                            <p>カテゴリー:&nbsp;<a href="{{url('media/category',$post->category->id)}}">{{$post->category->name}}</a></p>
                            <p>{{$post->content}}</p>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{$posts->links()}}

        </div>
    </div>
@endsection
