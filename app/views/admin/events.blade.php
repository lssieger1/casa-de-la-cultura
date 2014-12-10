@extends('layouts.master')

@section('title')
Admin Homepage
@stop

@section('style')
{{ HTML::style('css/dataTables.bootstrap.css') }}
{{ HTML::style('css/custom.css') }}
@stop

@section('content')
<div class="table-responsive">
	<table class="table table-bordered table-striped" id="adminEvents">
		<thead>
			<tr>
				<th class="col-8">
					DATE AND LOCATION
				</th>
				<th>
					NAME (TYPE)
				</th>
				<th>
					DESCRIPTION
				</th>
				<th>
					ACTIONS
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach  ($eventLists as $eventList)			
			<tr>
				<td class="col-sm-3">
					{{ $eventList->get_date() }} <br><br> {{ $eventList->location }}
				</td>
				<td class="col-sm-3">
					{{ $eventList->name }}  
				</td>
				<td class="col-sm-3">
					{{ $eventList->description }}
				</td>
				<td class="col-sm-3">
					{{ Form::open(['url'=> '/delete' ]) }}
						<a href = "edit/{{$eventList->event_id}}" class="btn btn-primary">Update</a>
						<span> </span>
						<a href = "attendance/{{$eventList->event_id}}" class="btn btn-primary">Attendance</a>
						<span> </span>
						<a href = "showAttendance/{{$eventList->event_id}}" class="btn btn-primary">View Attendance</a>
						<span> </span>
						<button name = "delete" class="btn btn-primary" onclick="if(!confirm('Are you sure to delete this item?')){return false;};">Delete</button>
						<input type="hidden" name="event_id" value = "{{$eventList->event_id}}"> 
					{{ Form::close() }}
				</td>
			</tr>
			@endforeach 
		</tbody>
	</table>
</div>

{{ HTML::script('jquery-1.11.1.js') }}
@stop