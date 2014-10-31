@extends('layouts.master')

@section('title')
Admin Homepage
@stop

@section('content')
<div class="table-responsive">
	<table class="table table-bordered table-striped">
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
					{{ $eventList->name}}  
				</td>
				<td>
					{{ $eventList->date}}
				</td>
				<td>
					{{ $eventList->description}}
				</td>
				<td>
					<button class="btn btn-primary">Update</button>
					<button class="btn btn-primary">Attendance</button>
					{{ Form::open(['url'=> '/delete' ]) }}
					<button name = "/delete"  class="btn btn-primary">Delete</button>
					 <input type="hidden" name="event_id" value = "{{$eventList->event_id}}"> 
					{{ Form::close()}}
				</td>
			</tr>
			@endforeach 

		</tbody>
	</table>
</div>
@stop