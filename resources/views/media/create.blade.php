@extends('layouts.default')
@section('content')

    <div class="col-xs col-xs-offset-2">
        <h1>投稿ページ</h1>

        {{--投稿完了時にフラッシュメッセージを表示--}}
{{--        @include('common.error')--}}

        <form action="create/store" method="post" class="form" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="title" class="control-label">記事タイトル</label>
                <div class="form-group">
                    <input type="text"  name="title" value="" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="cat_id" type="text" class="control-label">カテゴリー</label>
                <div class="">
                    <select name="cat_id" type="text" class="form-control">
                        <option></option>
                        <option value="1" name="1">IT</option>
                        <option value="2" name="2">政治・経済</option>
                        <option value="3" name="3">エンタメ</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <input id="file" type="file" name="image" class="form-inline">
                @if ($errors->has('image'))
                    {{ $errors->first('image') }}
                @endif
            </div>

            <div class="form-group">
                <label for="contents" class="control-label">本文</label>
                <div class="">
                    <textarea name="contents" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">投稿する</button>
            </div>
        </form>
    </div>
@endsection