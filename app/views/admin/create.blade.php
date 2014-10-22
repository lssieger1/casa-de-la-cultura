@extends('layouts.master')

@section('title')
@parent
Create a New Event
@stop

@section('style')

@stop

@section('content')
<h1>
	Create a New Event
</h1>
<center>
{{ Form::open() }}
	<div>
		{{ Form::label('name', 'Name: ', array('class' => 'form-control')) }}
		{{ Form::text('name', null, array('class' => 'form-control')) }}
	</div>
	<div>
		{{ Form::label('description', 'Description: ', array('class' => 'form-control')) }}
		<br>
		{{ Form::textarea('description', null, array('class' => 'form-control')) }}
	</div>
	<div>
		{{ Form::label('date', 'Date: ', array('class' => 'form-control')) }}
		<!-- {{ Form::selectMonth('month') }} -->
		{{ Form::input('date', 'date') }}
	</div>
	<div>
		<img src="/favicon.ico"\>
	</div>

	<div>
		{{ Form::label('event', 'Event: ') }}
		{{ Form::select('event', array("Swimming", "ESL"), array('class' => 'form-control')) }}
		{{ Form::text('other', 'Other') }}
	</div>

	<div>
		{{ Form::submit('Submit', array('class' => 'form-control')) }}
	</div>
<!-- <input type="text" class="form-control" placeholder="English as a Second Language" required autofocus>
<input type="textarea" class="form-control" placeholder="Enter a description here" required>
<input type="date" class="form-control" required> -->

{{ Form::close() }}
</center>
@stop