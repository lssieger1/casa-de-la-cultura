@extends('layouts.master')

@section('title')
<?php 
  // if ($eventLists.size() > 0 && date("Y-m-d") <= $eventLists[0]->date) {
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
					ACTIONS
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
					<a href = "showAttendance/{{$eventList->event_id}}" class="btn btn-info">View Attendance</a>
				</td>
			</tr>
			@endforeach 
		</tbody>
	</table>
</div>
@stop