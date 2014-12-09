@extends('layouts.master')

@section('title')
Reset Account Password
@stop

@section('style')
{{ HTML::style('css/custom.css') }}
@stop

@section('content')
{{ Form::open() }}
	<div>
		{{ Form::label('username', 'Username: ', array('class'=>'form-control')) }}
		{{ Form::text('username', null, array('class'=>'form-control')) }}
	</div>
	<div>
		{{ Form::label('password', 'Password: ', array('class'=>'form-control')) }}
		{{ Form::password('password', array('class'=>'form-control', 'required'=>'required')) }}
	</div>
	<div>
		{{ Form::label('verifyPassword', 'Verify Password: ', array('class'=>'form-control')) }}
		{{ Form::password('verifyPassword', array('class'=>'form-control')) }}
	</div>
	{{ Form::submit('Reset Password', array('class'=>'btn btn-primary form-control')) }}
{{ Form::close() }}
@stop