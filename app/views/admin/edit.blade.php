@extends('layouts.master')

@section('title')
@parent
Create a New Event
@stop

@section('style')

@stop

@section('content')
<h1>
	Edit an Event
</h1>
<center>
{{ Form::open(['route'=> 'events-created']) }}
	<div>
		{{ Form::label('name', 'Name: ', array('class' => 'form-control')) }}
		{{ Form::text('name', null, array('class' => 'form-control')) }}
		{{ $errors->first('name') }}
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
		{{ $errors->first('date') }}
	</div>
	<div>
		<img src="/favicon.ico"\>
	</div>

	<div>
		{{ Form::label('eventType', 'Event Type: ') }}
		{{ Form::select('eventType', EventType::all()->lists('type_name','type_id'), array('class' => 'form-control')) }}

		{{ Form::text('other', 'Other') }} <!-- validation needed if Other is selected to make sure this is filled in -->
		{{ $errors->first('other') }}
	</div>

	<div>
		{{ Form::submit('Submit', array('class' => 'form-control')) }}
	</div>

{{ Form::close() }}
</center>
@stop