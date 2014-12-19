@extends('layouts.master')

@section('title')
Administrator and Volunteer Sign In
@stop

@section('style')
<link href="css/sign-in.css" rel="stylesheet">
@stop
    
@section('content')
  {{ Form::open(['route' => 'sessions.store', 'class' => 'form-signin']) }}
    {{ Form::text('username', Input::old('username'), array('placeholder' => 'username', 'class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus')) }}
    {{ Form::password('password', array('placeholder' => 'password', 'class' => 'form-control', 'required' => 'required')) }}
    {{Form::submit('Sign in', array('class' => 'btn btn-lg btn-primary btn-block'))}} 
  {{ Form::close() }}
@stop