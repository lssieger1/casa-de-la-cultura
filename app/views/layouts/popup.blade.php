<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>
      @section('title')
      @show
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSS are placed here -->
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/bootstrap-theme.css') }}

    @yield('style')

    <style>
      @section('styles')
      body {
        padding-top: 60px;
      }
      @show
    </style>
  </head>

  <body>
    <!-- Container -->
    <div class="container">

      <!-- Content -->
      @yield('content')

    </div>

    <!-- Scripts are placed here -->
    {{ HTML::script('js/jquery-1.11.1.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}

  </body>
</html>