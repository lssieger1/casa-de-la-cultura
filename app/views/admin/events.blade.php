@extends('layouts.master')

@section('title')
Admin Homepage
@stop

@section('style')
{{ HTML::style('css/dataTables.bootstrap.css') }}
@stop

@section('content')
<p>&nbsp</p>
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
					{{ $eventList->get_date() }} {{ $eventList->location }}
				</td>
				<td>
					{{ $eventList->description}}
				</td>
				<td>
				<!-- 	{{ Form::open(['url'=> 'admin/edit' ]) }}
					<button data-eventList-id="{{$eventList->event_id}}" class="btn btn-primary" data-target="#editEventModal" data-toggle="modal">Update</button></li>
					<input type="hidden" name="event_id" value = "{{$eventList->event_id}}"> 
					{{ Form::close()}} -->
					<?php echo $eventList->event_id; ?>
					<button id="{{$eventList->event_id}}"
						    data-event-list-date="{{$eventList->date}}" 
						    data-event-list-location="{{$eventList->location}}"
						    data-event-list-description="{{$eventList->description}}"
						    data-target="#editEventModal" data-toggle="modal"
						    class="btn btn-primary edit_button">
						Update
					</button>
					<a href = "attendance/{{$eventList->event_id}}" class="btn btn-primary">Attendance</a>
					{{ Form::open(['url'=> '/delete' ]) }}
					<button name = "delete" class="btn btn-primary">Delete</button>
					<input type="hidden" name="event_id" value = "{{$eventList->event_id}}"> 
					{{ Form::close() }}
				</td>
			</tr>
			@endforeach 
		</tbody>
	</table>
</div>

<!-- Modals -->
@include('admin.edit')

{{ HTML::script('jquery-1.11.1.js') }}
<script type="text/javascript">
	$(document).on( "click", '.edit_button',function(e) {

        var clickedElement = e.target;
        alert(clickedElement.id + " " + clickedElement.dataset.eventListDescription);
        $(".event-edit-hidden").val(id);
        // $(".event-edit-type").val(clickedElement.dataset.eventListType);
        // $(".event-edit-date").val(clickedElement.dataset.eventListDate);
        $("#editLocation").val(clickedElement.dataset.eventListLocation);
        $("#editDescription").val(clickedElement.dataset.eventListDescription);
    });
</script>

@stop