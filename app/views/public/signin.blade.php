<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Sign in</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sign-in.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--script src="../../assets/js/ie-emulation-modes-warning.js"></script> -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container">
      {{ Form::open(['route' => 'sessions.store', 'class' => 'form-signin']) }}
        <h3 class="form-signin-heading">
          Administrator and Volunteer Sign In
        </h3>
        {{ Form::text('username', Input::old('username'), array('placeholder' => 'username', 'class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus')) }}
        {{ Form::password('password', array('placeholder' => 'password', 'class' => 'form-control', 'required' => 'required')) }}
        <div>
          {{ Form::checkbox('remember_me', 'Remember me') }}
          {{ Form::label('remember_me', "Remember me") }}
        </div>
        {{Form::submit('Login', array('class' => 'btn btn-lg btn-primary btn-block'))}} 
      {{ Form::close() }}
    </div>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->
  </body>
</html>