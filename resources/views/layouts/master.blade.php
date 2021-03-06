
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Blog Template</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/album.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="/css/blog.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      </main> 
        @include('layouts.nav')

        @if($flash = session('message'))
          <div id="flash-message" class="alert alert-success" role="alert">
            
            <p>{{$flash}}</p>
          
          </div>
        @endif

        <div class="row">

          @yield('content')

          @include('layouts.sidebar')

        </div> 

      </main> 

    </div> 

    @include('layouts.footer')


  </body>
</html>
