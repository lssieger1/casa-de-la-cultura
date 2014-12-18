@extends('layouts.master')

@section('title')
Change Password
@stop

@section('style')
{{ HTML::style('css/custom.css') }}
@stop

@section('content')
<h1>Change Password</h1>
{{ Form::open(['user-created']) }}
	<div class='input-group'>
		<span class='input-group-addon'>Current Password</span>
		{{ Form::password('currPassword', array('class'=>'form-control', 'required'=>'required')) }}
	</div>
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
	{{ Form::submit('Change Password', array('class'=>'btn btn-primary form-control')) }}
{{ Form::close() }}
@stop