@extends("templates.welcome")

@section('content')
    <section>
        <div class="container">
            <h1>Редактиввать</h1>
            <form class="add" action="{{route('post.update', $post->id)}}" method="post">
                @csrf
                @method('patch')
                <input type="title" placeholder="Заголовок" name="title" value="{{$post->title}}">
                <input type="text" placeholder="Картинка" name="image" value="{{$post->image}}">
                <textarea name="content" placeholder="Содержание" >{{$post->content}}</textarea>
                <select name="category_id">
                    @foreach($categories as $category)
                        <option
                            {{ $post->category_id === $category->id ? ' selected' : ''}}
                            value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
                <button type="submit">Изменить</button>
            </form>
        </div>
    </section>
@endsection
