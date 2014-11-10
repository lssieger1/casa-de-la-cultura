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
					{{ $eventList->date }} {{ $eventList->location }}
				</td>
				<td>
					{{ $eventList->description}} {{$eventList->event_id}}
				</td>
				<td>
					<button data-eventList-id="{{$eventList->event_id}}" class="btn btn-primary" data-target="#editEventModal" data-toggle="modal">Update</button></li>
					
					<a href = "attendance/{{$eventList->event_id}}" class="btn btn-primary">Attendance</a>

					{{ Form::open(['url'=> '/delete' ]) }}
					<button name = "delete" class="btn btn-primary">Delete</button>
					 <input type="hidden" name="event_id" value = "{{$eventList->event_id}}"> 
					{{ Form::close()}}
				</td>
			</tr>
			@endforeach 
		</tbody>
	</table>
</div>

<!-- Modals -->
@include('admin.edit')

{{ HTML::script('jquery-1.11.1.js') }}
<script>
	$(#editEventModal).on('show.bs.modal' function(e) {
	     var eventTest = $(e.relatedTarget).data('eventList-id');
	     $(e.currentTarget).find('input[name="description"]').val(eventTest);
	});
</script>
@stop