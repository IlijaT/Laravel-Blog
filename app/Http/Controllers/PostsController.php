<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

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
        $this->validate(request(), [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        auth()->user()->publish(
            new Post([
                'title' => request('title'),
                'body' => request('body')
            ])
        );

        return redirect('/');
    }

    
    public function create()
    {
        return view('posts.create');
    }
}
