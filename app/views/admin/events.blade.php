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
					<?php echo date("d F Y", strtotime($eventList->date)) ?> {{ $eventList->location }}
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
					<button id="{{$eventList->event_id}}" data-eventList-id="{{$eventList->event_id}}" class="btn btn-primary edit_button" data-target="#editEventModal" data-toggle="modal">Update</button></li>
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
        //var id = $(this).data('eventList');
        var id = clickedElement.id;
        // var description = $(this).data('description');
        // var location = $(this).data('location');

        $(".event-edit-description").val(id);
        alert(id);
       // $(".business_skill_id").val(id);
        //$(".business_skill_name").val(name);
        //$(".business_skill_quote").val(quote);
       //tinyMCE.get('business_skill_content').setContent(content);

    });

    </script>

@stop