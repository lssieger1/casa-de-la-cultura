@extends('layouts.master')

@section('title')
@parent
{{ $event }} Events
@stop

@section('style')
{{ HTML::style('css/dataTables.bootstrap.css') }}
@stop

@section('content')
<div class="table-responsive">
	<table class="table table-bordered table-striped" id="volunteerEventsTable">
		<thead>
			<tr>
				<th>
					DATE
				</th>
				<th>
					LOCATION
				</th>
				<th>
					PROGRAM NAME
				</th>
				<th>
					DESCRIPTION
				</th>
				<th>
					ATTENDANCE
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach  ($eventLists as $eventList)			
			<tr>
				<td class="col-sm-2">
					{{ $eventList->get_date() }}
				</td>
				<td class="col-sm-2">
					 {{ $eventList->location }}
				</td>
				<td class="col-sm-2">
					{{ $eventList->EventType->type_name }}
				</td>
				<td class="col-sm-2">
					{{ $eventList->description }}
				</td>
				<td>
					<?php 
      					$check =  date("Y-m-d");
      				?>
      				<div class="btn-group-vertical" role="group">
	      				@if($eventList->date > $check)
	      					<button class="btn btn-primary" disabled>Take Attendance</button>
	      					<button class="btn btn-info" disabled>View Attendance</button>
	      				@else
							<a href = "attendance/{{$eventList->event_id}}" class="btn btn-primary">Take Attendance</a>
							<a href = "showAttendance/{{$eventList->event_id}}" class="btn btn-info">View Attendance</a>
						@endif
					</div>
				</td>
			</tr>
			@endforeach 
		</tbody>
	</table>
</div>
@stop