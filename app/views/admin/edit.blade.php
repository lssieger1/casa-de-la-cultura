@extends('layouts.master')

@section('title')
Edit Event
@stop

@section('content')
	<!-- <button name = "edit" class="btn btn-primary">Edit</button>
			 <input type="hidden" name="event_id" value = "{{$eventList->event_id}}"> --> 
{{ Form::model($eventList, array('route' => array('admin.update', $eventList->event_id), 'method' => 'PUT')) }}
	<div>	 
		{{ Form::label('eventType', 'Event Type: ') }}
		{{ Form::select('eventType', EventType::all()->lists('type_name','type_id'), 
						array('class' => 'form-control')) }}

		{{ Form::text('other', null, array('placeholder' => 'Other',
											'class' => 'form-control event-edit-description')) }} 
		<!-- validation needed if Other is selected to make sure this is filled in -->
		{{ $errors->first('other') }}
	</div>
	<div>
		{{ Form::label('editEventDate', 'Date: ', array('class' => 'form-control')) }}
		<!-- {{ Form::selectMonth('month') }} -->
		{{ Form::input('date', 'editEventDate') }}
		{{ $errors->first('editEventDate') }}
	</div>
	<div>
		{{ Form::label('location', 'Location: ', array('class' => 'form-control')) }}
		{{ Form::text('location', null, array('class' => 'form-control')) }}
		{{ $errors->first('location') }}
	</div>
	<!-- <div>
		{{ Form::file('image') }}
		<img src="/favicon.ico"\>
	</div> -->
	<div>
		{{ Form::label('description2', 'Description: ', array('class' => 'form-control')) }}
		<!-- <input type="text" id="description" name="description" value=""> -->
		{{ Form::textarea('description', null, array('class' => 'form-control', 'resize' => 'none')) }}
	</div>
	<div>
		{{ Form::submit('Submit', array('class' => 'form-control btn-primary')) }}
	</div>
{{ Form::close() }}

{{ HTML::script('//code.jquery.com/jquery-1.10.2.js') }}
<script type="text/javascript">
	$(document).ready(function() {
		$( "#editEventDate" ).datepicker({dateFormat: "dd MM yy"});
	});
</script>

@stop