@extends('templates.welcome')

@section('content')
    <section>
        <div class="container">
            <h1>Добавить новый пост</h1>
            <form class="add" action="{{route('post.store')}}" method="post">
                @csrf
                <input type="title" placeholder="Заголовок" name="title">
                <input type="text" placeholder="Картинка" name="image">
                <textarea name="content" placeholder="Содержание"></textarea>
                <select name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
                <button type="submit">Добавить</button>
            </form>
        </div>
    </section>
@endsection
