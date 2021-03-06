<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Store with Laravel">
    <meta name="author" content="Manten">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Tienda X' }}</title>
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}"> 
  </head>

  <body>
    @include('layouts.navbar')
    
    <main class="container">
      @yield('content')
    </main>
    
    <footer class="footer">
      <div class="container">
        <p class="text-center">&copy; Copyright - <a href="//manten-dev.me" target="_blank">Manten Developement 2017</a></p>
      </div>
    </footer>

    <script src="{{ mix('/js/app.js') }}"></script>
    <script src="{{ asset('/js/script.js') }}"></script> 
  </body>
</html>