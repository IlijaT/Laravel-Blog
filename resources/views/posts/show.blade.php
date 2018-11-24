@extends('layouts.master')

@section('content')
  <div class="col-md-8 blog-post">
    
    <h1>{{ $post->title }}</h1>

    <p>{{ $post->body }}</p>

    <hr>

    <div class="comments">

      @foreach($post->comments as $comment)
       <ul class="list-group">

         <li class="list-group-item">

          <strong>

              {{ $comment->user->name }} - {{ $comment->created_at->diffForHumans() }}: &nbsp;

          </strong>
         

          {{ $comment->body }}

         </li>

       </ul>
      @endforeach
  
    </div>

    <hr>

    <div>

      <form method="POST" action="/posts/{{ $post->id }}/comments">

        @csrf
  
        <div class="form-group">
          <textarea class="form-control" placeholder="Your comment here..." id="body" name="body" rows="3" required></textarea>
        </div>
  
        <div class="form-group">
          <button type="submit" class="btn btn-dark">Add Comment</button>
        </div>
        
      </form>

      @include('layouts.errors')


    </div>
    
  </div>
@endsection