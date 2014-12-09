@extends('layouts.master')

@section('title')
Attendance
@stop

@section('style')
{{ HTML::style('css/dataTables.bootstrap.css') }}
{{ HTML::style('css/custom.css') }}
@stop

@section('content')
<div class="pull-right">
	<a href="browseAllParticipants/{{$event_id}}" class="btn btn-lg btn-primary">Browse</a>
</div>
 <div class="table-responsive">
    <table class="table table-striped table-bordered" id="attendanceTable">
		<thead>
			<tr>
				<th>
					NAME
				</th>
				<th>
					USERNAME
				</th>
				<th>
					EMAIL
				</th>
				<th>
					UPDATE INFORMATION
				</th>
				<th>
					RESET PASSWORD
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
						{{ $participant->username }}
					</td>
					<td>
						{{ $participant->email }}
					</td>
					<td>
						{{ Form::open(['url'=> '/takeAttendance']) }}
							<input type="hidden" name="part_id" value = "{{ $participant->part_id }}">
							<input type="hidden" name="event_id" value = "{{ $event_id }}">  
							<button name="takeAttendance"  class="btn btn-primary">Update Information</button>				 
						{{ Form::close() }}
					</td>
					<td>
						{{ Form::open(['url'=> '/takeAttendance']) }}
							<input type="hidden" name="part_id" value = "{{ $participant->part_id }}">
							<input type="hidden" name="event_id" value = "{{ $event_id }}">  
							<button name="takeAttendance"  class="btn btn-primary">Reset Password</button>				 
						{{ Form::close() }}
					</td>
				</tr>
				@endif
			@endforeach
		</tbody>
	</table>
</div>
@stop