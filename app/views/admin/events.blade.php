@extends('layouts.master')

@section('title')
Admin Homepage
@stop

@section('style')
{{ HTML::style('css/dataTables.bootstrap.css') }}
@stop

@section('content')
<div class="table-responsive">
	<table class="table table-bordered table-striped" id="adminEventsTable">
		<thead>
			<tr>
				<th class="col-8">
					DATE AND LOCATION
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
				<td class="col-sm-3">
					{{ $eventList->get_date() }} <br><br> {{ $eventList->location }}
				</td>
				<td class="col-sm-3">
					{{ $eventList->EventType->type_name }}
				</td>
				<td class="col-sm-3">
					{{ $eventList->description }}
				</td>
				<td class="col-sm-3">
					<?php
						$check = DB::table('attendance')->where('event_id','=',$eventList->event_id)->get();
					?>
					@if(count($check)==0)
					<a href = "edit/{{$eventList->event_id}}" class="btn btn-primary">Update</a>
					@else
					<button type="button" disabled>Update</button>
					@endif
					<span> </span>
					<?php 
      					$check =  date("Y-m-d");
      				?>
      				@if($eventList->date > $check)
      					<a class="btn btn-primary" disabled>Attendance</a>
      				@else
						<a href = "attendance/{{$eventList->event_id}}" class="btn btn-primary">Attendance</a>
					@endif
					<span> </span>
					<a href = "showAttendance/{{$eventList->event_id}}" class="btn btn-primary">View Attendance</a>
					<span> </span>
					{{ Form::open(['url'=> '/delete' ]) }}
						<button name = "delete" class="btn btn-primary" onclick="if(!confirm('Are you sure to delete this item?')){return false;};">Delete</button>					
						<input type="hidden" name="event_id" value = "{{$eventList->event_id}}"> 
					{{ Form::close() }}
				</td>
			</tr>
			@endforeach 
		</tbody>
	</table>
</div>
@stop