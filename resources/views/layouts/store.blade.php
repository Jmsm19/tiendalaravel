<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Store with Laravel">
    <meta name="author" content="Manten">
    <title>Tienda X</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="/css/style.css"> 
  </head>

  <body>
    @include('layouts.navbar')
    
    <main class="container">
      <div class="row hero">
        @include('pages.hero')
      </div>

      <div class="row products">
        @include('pages.products')
      </div>
    </main> <!-- /container -->
    
    <footer class="footer">
      <div class="container">
        <p class="text-center">&copy; Copyright - Manten Developement 2017</p>
      </div>
    </footer>

    <script src="{{ mix('/js/app.js') }}"></script>
    <script src="./js/script.js"></script> 
  </body>
</html>