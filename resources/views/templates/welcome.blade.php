<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<nav>
    <div class="container">
        <a href="{{route('main')}}">Главная</a>
        <a href="{{route('post.index')}}">Все посты</a>
        <a href="{{route("post.create")}}">Добавить</a>
    </div>
</nav>
@yield('content')
</body>
</html>
