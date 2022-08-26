@extends('templates.welcome')

@section('content')
    <section>
        <div class="container">
            <h1>Добавить новый пост</h1>
            <form class="add" action="{{route('post.store')}}" method="post">
                @csrf
                <input value="{{old('title')}}" type="title" placeholder="Заголовок" name="title">
                @error('title')
                <p>{{$message}}</p>
                @enderror
                <input value="{{old('image')}}" type="text" placeholder="Картинка" name="image">
                @error('image')
                <p>{{$message}}</p>
                @enderror
                <textarea name="content" placeholder="Содержание">{{old('content')}}</textarea>
                @error('content')
                <p>{{$message}}</p>
                @enderror
                <select name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>

                <select multiple name="tags[]">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
                <button type="submit">Добавить</button>
            </form>
        </div>
    </section>
@endsection
