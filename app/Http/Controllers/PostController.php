<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::where('id', 3)->first();
        dd($posts);
        return $posts;
    }
    public function create(){
        $data = [
            [
                "title" => 'нОВАЯ ЗАПИСЬ',
                "content" => 'Контент новой записи',
                "image" => 'image',
                "likes" => 20,
                "is_published" => 1,
            ],
            [
                "title" => 'Вторая нОВАЯ ЗАПИСЬ',
                "content" => 'Контент новой записи',
                "image" => 'image',
                "likes" => 20,
                "is_published" => 1,
            ],
        ];
        foreach ($data as $arr){
            Post::create($arr);
        }
    }
    public function update(){
        Post::find(4)->update(['title' => "updated"]);

    }
    public function delete(){
        Post::withTrashed()->find(1)->restore();
    }
}
