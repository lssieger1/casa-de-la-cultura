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
	<div>
		{{ Form::label('currPassword', 'Current Password: ', array('class'=>'form-control')) }}
		{{ Form::password('currPassword', array('class'=>'form-control')) }}
	</div>
	<div>
		{{ Form::label('password', 'New Password: ', array('class'=>'form-control')) }}
		{{ Form::password('password', array('class'=>'form-control', 'required'=>'required')) }}
	</div>
	<div>
		{{ Form::label('verifyPassword', 'Verify Password: ', array('class'=>'form-control')) }}
		{{ Form::password('verifyPassword', array('class'=>'form-control')) }}
	</div>
	{{ Form::submit('Change Password', array('class'=>'btn btn-primary form-control')) }}
{{ Form::close() }}
@stop