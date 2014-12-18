@extends('layouts.master')

@section('title')
<?php 
  // if (date("Y-m-d") <= $eventLists[0]->date) {
  //   echo "Upcoming";
  // }
  // else {
  //   echo "Past";
  // }
?>
 Events
@stop

@section('style')
{{ HTML::style('css/dataTables.bootstrap.css') }}
@stop

@section('content')
<div class="table-responsive">
	<table class="table table-bordered table-striped" id="adminEventsTable">
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
					ACTIONS
				</th>
				<th>
					???
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
      				@if($eventList->date > $check)
      					<a class="btn btn-primary" disabled>Take Attendance</a>
      				@else
						<a href = "attendance/{{$eventList->event_id}}" class="btn btn-primary">Take Attendance</a>
					@endif
					<span> </span>
					<a href = "showAttendance/{{$eventList->event_id}}" class="btn btn-info">View Attendance</a>
					<span> </span>
				</td>
				<td>

					<a href = "edit/{{$eventList->event_id}}" class="btn btn-success">Update</a>
					{{ Form::open(['url'=> '/delete' ]) }}
						<button name = "delete" class="btn btn-danger" onclick="if(!confirm('Are you sure to delete this event?')){return false;}">Delete</button>
						<input type="hidden" name="event_id" value = "{{$eventList->event_id}}"> 
					{{ Form::close() }}
				</td>
			</tr>
			@endforeach 
		</tbody>
	</table>
</div>
@stop