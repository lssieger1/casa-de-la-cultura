<!doctype html>

<html>

  <head>
  
     <meta charset="utf-8">
     
  </head>
  
  <body>
  
    {{ Form::open(['route' => 'sessions.store']) }}
    <div>
       {{ Form::label('username', 'Username: ') }}
       {{ Form::text('username') }}
    </div>
    
    <div>
    	{{ Form::label('password', 'Password: ') }}
    	{{ Form::password('password') }}
    </div>
    
    <div> {{Form::submit('Login')}} </div>
    {{ Form::close() }}