<div class="blog-post">

  <h4 class="blog-post-title">

    <a href="/posts/{{ $post->id }}">

        {{ $post->title }}

    </a>

  </h4>


    <p class="blog-post-meta">{{ $post->user->name }} on {{ $post->created_at->toFormattedDateString()}} </p>

    <hr>


    <p> {{ $post->body }}</p>
    
</div> 