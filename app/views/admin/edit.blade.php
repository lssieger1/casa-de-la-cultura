@extends('layouts.master')

@section('title')
Edit Event
@stop

@section('content')
	{{ Form::model($eventList, array('route' => array('admin.update', $eventList->event_id), 'method' => 'PUT')) }}
	<div>
		{{ Form::label('eventType', 'Event Type: ', array('class'=>'form-control')) }}
		{{ Form::select('eventType', (EventType::all()->lists('type_name','type_id') + 
			array('Other')), 0, array('class' => 'form-control')) }}

		{{ Form::text('other', null, array('placeholder' => 'Other',
											'class' => 'form-control event-edit-description')) }} 
		<!-- validation needed if Other is selected to make sure this is filled in -->
		{{ $errors->first('other') }}
	</div>
	<div>
		{{ Form::label('date', 'Date: ', array('class' => 'form-control')) }}
		{{ Form::input('date', 'date', null, array('class'=>'form-control')) }}
		{{ $errors->first('date') }}
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