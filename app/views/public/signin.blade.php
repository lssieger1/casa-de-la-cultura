@extends('layouts.master');

@section('title')
Sign in
@stop

@section('style')
<link href="css/sign-in.css" rel="stylesheet">
@stop
    
@section('content')
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
@stop