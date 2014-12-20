<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ URL::asset('images/logo.png') }}">
    <title>@yield('title')</title>

    <!-- CSS are placed here -->
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/jquery-ui.css') }}
    {{ HTML::style('//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css') }}
    {{ HTML::style('css/prettyPhoto.css') }}
    {{ HTML::style('css/jquery.dataTables.css') }}
    {{ HTML::style('css/dataTables.tableTools.css') }}
    {{ HTML::style('css/dataTables.responsive.css') }}
    @yield('style')
    <style>body {
      padding: 108px;
    }
    h2 {
      color: #FFF !important;
    }
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
            <div class="logo">         
                <a class="navbar-brand" href="{{{ URL::to('/events') }}}"><img src="{{ URL::asset('images/logo.png') }}"/></a>
            </div>
        </div>

        <!-- Everything you want hidden at 940px or less, place within here -->
        <div class="collapse navbar-collapse navbar-right">
          <ul class="nav navbar-nav">
          @if(Auth::check())           
              <li><a href="{{{ URL::to('/pastEvents') }}}">Past Events</a></li>
              <li><a href="{{{ URL::to('/events') }}}">Upcoming Events</a></li>
              @if(!Request::is('runQuery'))
                <li><a href="#registerParticipantModal" data-toggle="modal">Register Part.</a></li>
              @endif
            @if(Auth::user()->user_type == 1)
              @if(!Request::is('runQuery'))
                <li><a href="#createEventModal" data-toggle="modal">New Event</a></li>
              @endif
              <li><a href="{{{ URL::to('/query') }}}">Run Query</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  Accounts<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="{{{ URL::to('/newUser') }}}">New Account</a></li>
                  <li><a href="{{{ URL::to('/changePassword') }}}">Change Password</a></li>
                  <li><a href="{{{ URL::to('/browseAllUsers') }}}">Browse All Users</a></li>
                </ul>
              </li>
            @else
              <li><a href="{{{ URL::to('/changePassword') }}}">Change Password</a></li>
            @endif
            <li><a href="{{{ URL::to('/signout') }}}">Sign Out</a></li>
          @else
            <li><a href="{{{ URL::to('/pastEvents') }}}">Past Events</a></li>
            <li><a href="{{{ URL::to('/events') }}}">Upcoming Events</a></li>
            <li><a href="{{{ URL::to('/signin') }}}">Sign In</a></li>
          @endif
          </ul>
        </div>
      </div>
    </div> 

    <!-- Container -->
    <div class="container">
      <div class="page-header">
        <h2>@yield('title')</h2>
      </div>
      <!-- Content -->
      @yield('content')
    </div>

    <!-- Modals -->
    @include('volunteer.register')
    @include('admin.create')

    <!-- Scripts are placed here -->
    {{ HTML::script('js/jquery.js') }}
    {{ HTML::script('js/jquery-ui.js') }}
    {{ HTML::script('js/bootstrap.js') }}
    {{ HTML::script('js/jquery.dataTables.js') }}
    {{ HTML::script('js/dataTables.bootstrap.js') }}
    {{ HTML::script('js/dataTables.tableTools.js') }}
    {{ HTML::script('js/dataTables.responsive.js') }}
    {{ HTML::script('js/dataTAbles.dateSorting.js') }}

    <script>
      $(document).ready(function() {
        $('#adminEventsTable').dataTable({
          "responsive" : true,
          "columnDefs": [
            { "type": "date-dd-mmm-yyyy", targets: 0 }
          ],
          "aoColumns": [
            null,
            null,
            null,
            null,
            { "bSearchable" : false },
            { "bSearchable" : false }
          ]
        });
      });
      $(document).ready(function() {
        $('#volunteerEventsTable').dataTable({
          "responsive" : true,
          "order": [[ 0, "desc" ]],
          "columnDefs": [
            { "type": "date-dd-mmm-yyyy", targets: 0 }
          ],
          "aoColumns": [
            null,
            null,
            null,
            null,
            { "bSearchable" : false }
          ]
        });
      });
      $(document).ready(function() {
        $('#attendanceTable').dataTable({
          "responsive" : true,
          "columnDefs": [
            { "type": "date-dd-mmm-yyyy", targets: 1 },
            { "type": "numeric", targets: 2 }
          ],
          "aoColumns": [
            null,
            null,
            null,
            null,
            { "bSearchable" : false }
          ]
        });
      });
      $(document).ready(function() {
        $('#reportResultsTable').dataTable({
          "sDom": 'T<"clear">lfrtip',
          "oTableTools": {
            "aButtons": [
              "xls",
              "pdf",
              "print"
            ],
            "sSwfPath": "{{asset('/swf/copy_csv_xls_pdf.swf')}}"
          }
        });
      });
      $(document).ready(function() {
        $('#allUsersTable').dataTable({
          "responsive" : true,
          "aoColumns": [
            null,
            null,
            null,
            null,
            { "bSearchable" : false }
          ]
        });
      });
      $(document).ready(function() {
        $('#showAttendanceTable').dataTable({
          "responsive" : true,
          "columnDefs": [
            { "type": "date-dd-mmm-yyyy", targets: 1 },
            { "type": "numeric", targets: 2 }
          ],
          "sDom": 'T<"clear">lfrtip',
          "oTableTools": {
            "aButtons": [
              "xls",
              "pdf",
              "print"
            ],
            "sSwfPath": "{{asset('/swf/copy_csv_xls_pdf.swf')}}"
          }
        });
      });
    </script>
  </body>
</html>