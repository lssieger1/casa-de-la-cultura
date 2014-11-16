@extends('layouts.master')

@section('title')
Edit Event
@stop

@section('content')
{{ Form::open(['route'=> 'event-edited']) }}
	<!-- <button name = "edit" class="btn btn-primary">Edit</button>
			 <input type="hidden" name="event_id" value = "{{$eventList->event_id}}"> --> 

	<div>	 
		{{ Form::label('eventType', 'Event Type: ') }}
		{{ Form::select('eventType', EventType::all()->lists('type_name','type_id'), array('class' => 'form-control')) }}

		{{ Form::text('other', null, array('placeholder' => 'Other', 'class' => 'form-control event-edit-description')) }} <!-- validation needed if Other is selected to make sure this is filled in -->
		{{ $errors->first('other') }}
	</div>
	<div>
		{{ Form::label('date2', 'Date: ', array('class' => 'form-control')) }}
		<!-- {{ Form::selectMonth('month') }} -->
		{{ Form::input('date', 'date2') }}
		{{ $errors->first('date') }}
	</div>
	<div>
		{{ Form::label('location', 'Location: ', array('class' => 'form-control')) }}
		{{ Form::text('location', $eventList->location, array('class' => 'form-control')) }}
		{{ $errors->first('location') }}
	</div>
	<div>
		{{ Form::file('image') }}
		<img src="/favicon.ico"\>
	</div>
	<div>
		{{ Form::label('location', 'Location:') }}
		{{ Form::text('location', $eventList->location) }}
		{{ Form::label('description2', 'Description: ', array('class' => 'form-control')) }}
		<!-- <input type="text" id="description" name="description" value=""> -->
		{{ Form::textarea('description', $eventList->description, array('class' => 'form-control', 'resize' => 'none')) }}
	</div>
	<div>
		{{ Form::submit('Submit', array('class' => 'form-control btn-primary')) }}
	</div>
{{ Form::close() }}

{{ HTML::script('//code.jquery.com/jquery-1.10.2.js') }}
<script type="text/javascript">
	$(document).ready(function() {
		$( "#date2" ).datepicker({dateFormat: "dd MM yy"});
	});
</script>

@stop