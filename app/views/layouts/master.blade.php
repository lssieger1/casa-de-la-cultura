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
    <!-- {{ HTML::style('css/style.css') }} -->
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/bootstrap-theme.css') }}
    {{ HTML::style('css/jquery-ui.css') }}
    {{ HTML::style('//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css') }}
    <!-- {{ HtML::style('css/prettyPhoto.css') }} -->

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
    <!-- Navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <div class="logo"><a class="navbar-brand" href="{{{ URL::to('/') }}}"><img src="images/logo.png"/></a></div>
        </div>

        <!-- Everything you want hidden at 940px or less, place within here -->
        <div class="collapse navbar-collapse navbar-right">
          <ul class="nav navbar-nav">
            <li><a href="{{{ URL::to('/pastEvents') }}}">Past Events</a></li>
            <li><a href="{{{ URL::to('/events') }}}">Upcoming Events</a></li>
            <li><a href="{{{ URL::to('/query') }}}">Class Query</a></li>
            @if(Auth::check())
              @if(Auth::user()->user_type == 1)
                <li><a href="#createEventModal" data-toggle="modal">New Event</a></li>
              @endif    
              <li><a href="#registerParticipantModal" data-toggle="modal">Register</a></li>
              <li><a href="{{{ URL::to('/signout') }}}">Sign Out</a></li>
            @else
              <li><a href="{{{ URL::to('/signin') }}}">Sign In</a></li>
            @endif
          </ul>
        </div>
      </div>
    </div> 

    <!-- Container -->
    <div class="container">
      <!-- Content -->
      @yield('content')
    </div>

    <!-- Modals -->
    @include('volunteer.register')
    @include('admin.create')

    <!-- Scripts are placed here -->
    {{ HTML::script('//code.jquery.com/jquery-1.10.2.js') }}
    {{ HTML::script('js/jquery-ui.js') }}
    {{ HTML::script('js/bootstrap.js') }}
    {{ HTML::script('js/jquery.dataTables.js') }}
    {{ HTML::script('js/dataTables.bootstrap.js') }}
    <script>
      $(document).ready(function() {
        $('#adminEvents').dataTable();
      });
      $(document).ready(function() {
        $('#attendanceTable').dataTable();
      });
    </script>
  </body>
</html>