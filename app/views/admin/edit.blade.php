@extends('layouts.master')

@section('title')
Edit Event
@stop

@section('content')
	{{ Form::model($eventList, array('route' => array('admin.update', $eventList->event_id), 'method' => 'PUT')) }}
	<div class='input-group'>
		<span class='input-group-addon'>Program</span>
		{{ Form::select('eventType', (EventType::all()->lists('type_name','type_id') + 
			array('Other')), $eventList->type_id, array('class'=>'form-control', 'required'=>'required')) }}
		{{ Form::text('other', null, array('placeholder' => 'Other', 'class' => 'form-control')) }} 
		<!-- validation needed if Other is selected to make sure this is filled in -->
		{{ $errors->first('other') }}
	</div>
	<div class='input-group'>
		<span class='input-group-addon'>Date</span>
		{{ Form::input('text', 'date', null, array('class'=>'form-control', 'required'=>'required', 'id'=>'date')) }}
		{{ $errors->first('date') }}
	</div>
	<div class='input-group'>
		<span class='input-group-addon'>Location</span>
		{{ Form::text('location', null, array('class'=>'form-control', 'required'=>'required')) }}
		{{ $errors->first('location') }}
	</div>
	<!-- <div>
		{{ Form::file('image') }}
		<img src="/favicon.ico"\>
	</div> -->
	<div class='input-group'>
		<span class='input-group-addon'>Description</span>
		{{ Form::textarea('description', null, array('class'=>'form-control', 'resize'=>'none')) }}
	</div>
	<div>
		{{ Form::submit('Submit', array('class' => 'form-control btn-primary')) }}
	</div>
{{ Form::close() }}

{{ HTML::script('//code.jquery.com/jquery-1.10.2.js') }}
<script type="text/javascript">
	$(document).ready(function() {
		$("#date").datepicker({changeMonth: true,
							   changeYear: true,
							   dateFormat: "dd MM yy",
							   yearRange: "-2:+2"});
	});
</script>

@stop