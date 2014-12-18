@extends('layouts.master')

@section('title')
Take Attendance for {{ $event->EventType->type_name }} on {{ $event->get_date() }}
@stop

@section('style')
{{ HTML::style('css/dataTables.bootstrap.css') }}
{{ HTML::style('css/custom.css') }}
@stop

@section('content')
<div class="pull-right">
	<a href="browseAllParticipants/{{$event_id}}" class="btn btn-default btn-primary">Find other</a>
</div>
<table class="table table-striped table-bordered dt-responsive" id="attendanceTable">
	<thead>
		<tr>
			<th>
				NAME
			</th>
			<th>
				DATE OF BIRTH
			</th>
			<th>
				PHONE NUMBER
			</th>
			<th>
				ADDRESS
			</th>
			<th>
				LOG OR UPDATE
			</th>
		</tr>
	</thead>
	<tbody>
		@foreach  ($participants as $participant)	
			<?php 
				$part_id = $participant->part_id;
				$type_id = DB::table('events')->where('event_id', '=', $event_id)
			  									   ->pluck('type_id');
				//people who attended this type of event
			    $takenAttendance =  DB::table('attendance')->where('part_id', '=', $part_id)
			  									   ->where('type_id', '=', $type_id)
			  									   ->get();

			    $records = DB::table('attendance')->where('part_id', '=', $part_id)
			  									   ->where('type_id', '=', $type_id)
			  									   ->where('event_id','=',$event_id)
			  									   ->first();
			?>
			@if($takenAttendance != null)				
			<tr>
				<td>
					{{ $participant->fname }} {{ $participant->lname }}  
				</td>
				<td>
					{{ $participant->get_dob() }}
				</td>
				<td>
					{{ $participant->phoneNo }}
				</td>
				<td>
					{{ $participant->address }} {{ $participant->city }} {{ $participant->state }}
				</td>
				<td>
					<div class="btn-group-vertical" role="group" aria-label="...">
						@if($records === NULL)
							{{ Form::open(['url'=> '/takeAttendance']) }}
								<input type="hidden" name="part_id" value = "{{ $participant->part_id }}">
								<input type="hidden" name="event_id" value = "{{ $event_id }}">
								<button name="takeAttendance"  class="btn btn-primary">Take Attendance</button>				 
							{{ Form::close() }}

						@else
							<button class="btn btn-info" disabled>Attendance Taken</button>
							{{ Form::open(['url'=> '/deleteAttendance']) }}
								<input type="hidden" name="part_id" value = "{{ $participant->part_id }}">
								<input type="hidden" name="event_id" value = "{{ $event_id }}">  
								<button name="deleteAttendance"  class="btn btn-danger" onclick="if(!confirm('Are you sure to remove this participant from this event?')){return false;}">Delete Attendance</button>
							{{ Form::close() }}
						@endif
						<input type="hidden" name="part_id" value = "{{ $participant->part_id }}">
						<input type="hidden" name="event_id" value = "{{ $event_id }}"> 
						<a href="{{$participant->part_id}}/edit" class="btn btn-success">Update</a> 
					</div>
				</td>
			</tr>
			@endif
		@endforeach
	</tbody>
</table>
<div class="pull-right">
	<a href="browseAllParticipants/{{$event_id}}" class="btn btn-lg btn-primary">New to this program</a>
</div>
@stop