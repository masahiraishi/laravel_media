<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8">
    {{--bootstrap--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <title>LaravelPicks</title>
    <style>
        .footer{text-align:right;font-size:10pt; margin:20px;
            border-bottom:solid 1px #ccc; color:#ccc;}
    </style>
    <link rel="stylesheet" type="text/css" href="/css/app.css">

</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a href="{{url('/media')}}" class="navbar-brand">
                LaravelPicks
            </a>
        </div>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
<div class="footer">
    copyright 2018 MASASHI.
</div>
</body>
</html>