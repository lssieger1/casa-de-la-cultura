@extends('layouts.master')

@section('title')
Admin Homepage
@stop

@section('style')
{{ HTML::style('css/dataTables.bootstrap.css') }}
<!-- {{ HTML::style('css/sb-admin-2.css') }} -->
@stop

@section('content')
<div class="table-responsive">
	<table class="table table-bordered table-striped" id="adminEvents">
		<thead>
			<tr>
				<th>
					NAME (TYPE)
				</th>
				<th>
					DATE AND LOCATION
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
				<td>
					{{ $eventList->name }}  
				</td>
				<td>
					{{ $eventList->get_date() }} <br><br> {{ $eventList->location }}
				</td>
				<td>
					{{ $eventList->description }}
				</td>
				<td>
					{{ Form::open(['url'=> '/delete' ]) }}
						<a href = "edit/{{$eventList->event_id}}" class="btn btn-primary">Update</a>
						<span> </span>
						<a href = "attendance/{{$eventList->event_id}}" class="btn btn-primary">Attendance</a>
						<span> </span>
						<button name = "delete" class="btn btn-primary">Delete</button>
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