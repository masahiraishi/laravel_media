
{{--入力エラーがあれば--}}
@if(count($errors) >0)
    @foreach ($errors->all() as $error)
        <p class="bg-danger">{{$error}}</p>
    @endforeach

@endif