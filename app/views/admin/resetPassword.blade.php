@extends('layouts.master')

@section('title')
Reset {{ $user->name }}'s Password
@stop

@section('style')
{{ HTML::style('css/custom.css') }}
@stop

@section('content')
{{ Form::model($user, array('route' => array('reset_pass', $user->id), 'method' => 'PUT')) }}
	@if($errors->any())
		{{ $errors->first() }}
	@endif
	<div class='input-group'>
		<span class='input-group-addon'>New Password</span>
		{{ Form::password('password', array('class'=>'form-control', 'required'=>'required')) }}
	</div>
	<div class='input-group'>
		<span class='input-group-addon'>Verify Password</span>
		{{ Form::password('verifyPassword', array('class'=>'form-control', 'required'=>'required')) }}
	</div>
	{{ Form::submit('Reset Password', array('class'=>'btn btn-primary form-control')) }}
{{ Form::close() }}
@stop