@extends('layouts.master')

@section('content')

<div class="col-md-8 blog-main">

  <h1>Publish a post</h1>

  <hr>

  <form method="POST" action="/posts">

      @csrf

      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>

      <div class="form-group">
        <label for="body">Body</label>
        <textarea class="form-control" id="body" name="body" rows="3"></textarea>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-dark">Publish</button>
      </div>
      
    </form>

   @include('layouts.errors')

    
    
</div>

@endsection