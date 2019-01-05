{{--画像登録一覧--}}
@foreach($photos as $photo)
    <div class="panel panel-default">
        <div class="panel-heading">アップロードした日付：{{$photo->created_at}}</div>
        <ul class="list-group">
            <li class="list-group-item"><img src="{{$photo->path}}"></li>
        </ul>
    </div>
@endforeach