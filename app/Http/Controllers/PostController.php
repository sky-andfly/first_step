<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::all();
        return view("post.index", ['posts' => $posts]);
    }

    public function create()
    {
        $category = Category::all();
        $tags = Tag::all();
        return view('post.create', ['categories' => $category, 'tags' => $tags]);
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|string',
            'category_id' => 'required',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        $post = Post::create($data);
        $post->tags()->attach($tags);
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', ['post' => $post, 'categories' => $categories, 'tags' => $tags]);
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);


        $post->update($data);
        $post->tags()->sync($tags);
        return to_route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('post.index');
    }
}
