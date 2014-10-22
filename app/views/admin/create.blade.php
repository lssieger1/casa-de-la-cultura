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
{{ Form::open(['route'=> 'events-created']) }}
	<div>
		{{ Form::label('name', 'Name: ') }}
		{{ Form::text('name') }}
		{{ $errors->first('name') }}
	</div>
	<div>
		{{ Form::label('description', 'Description: ') }}
		{{ Form::textarea('description') }}
		{{ $errors->first('description') }}
	</div>
	<div>
		{{ Form::label('date', 'Date: ') }}
		{{ Form::input('date', 'date') }}
		{{ $errors->first('date') }}
	</div>
	<div>
		<img src="/favicon.ico"\>
	</div>

	<div>
		{{ Form::label('eventType', 'Event type: ') }}
		{{ Form::select('eventType', array( EventType::all()->lists('type_name') )) }}
		{{ Form::text('other', 'Other') }}
	</div>

	<div>
		{{ Form::submit('Submit') }}
	</div>
<!-- <input type="text" class="form-control" placeholder="English as a Second Language" required autofocus>
<input type="textarea" class="form-control" placeholder="Enter a description here" required>
<input type="date" class="form-control" required>
 -->
{{ Form::close() }}
@stop