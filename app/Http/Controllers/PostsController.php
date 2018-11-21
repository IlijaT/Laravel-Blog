<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();

        return view('posts.index', ['posts' => $posts ]);
    }


    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }


    public function store()
    {
        $validatedData = $this->validate(request(), [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        Post::create($validatedData);

        return redirect('/');
    }

    
    public function create()
    {
        return view('posts.create');
    }
}
