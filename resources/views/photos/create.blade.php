@extends('layouts.default')

@section('content')
<div>
<h1>画像のアップロード</h1>

<form method="post" action="{{ action('PhotosController@store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}

    <fieldset>
        <div>
            <input id="file" type="file" name="image">

            @if ($errors->has('image'))
                {{ $errors->first('image') }}
            @endif
        </div>
    </fieldset>

    <input type="submit" value="アップロード" class="mb-30 mt-10">
</form>
    {{--画像登録一覧--}}
    @foreach($photos as $photo)
        <div class="panel panel-default">
            <div class="panel-heading">アップロードした日付：{{$photo->created_at}}</div>
            <ul class="list-group">
                <li class="list-group-item" style="list-style: none;">
                    <img src="{{$photo->path}}" height="100">
                </li>
            </ul>
        </div>
    @endforeach
</div>
@endsection