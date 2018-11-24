<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Post::latest()
                ->filter(request(['month', 'year']))
                ->get();


        // Temporary
        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) DESC')
            ->get()
            ->toArray();

        return view('posts.index', [
            'posts' => $posts,
            'archives' => $archives
        ]);
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
