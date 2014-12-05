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
	<a href="browseAllParticipants" class="btn btn-primary" id="browse">Browse</a>
</div>
 <div class="table-responsive">
    <table class="table table-striped table-bordered" id="attendanceTable">
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
					SELECT
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
						<table>
							<tr>
								<td>
									{{ Form::open(['url'=> '/takeAttendance']) }}
											<input type="hidden" name="part_id" value = "{{ $participant->part_id }}">
											<input type="hidden" name="event_id" value = "{{ $event_id }}">  
											<button name="takeAttendance"  class="btn btn-primary">Take Attendance</button>				 
									{{ Form::close() }}	
							</tr>
						</table>
					</td>
				</tr>
				@endif
			@endforeach
		</tbody>
	</table>
</div>
<div class="pull-right">
	<a href="browseAllParticipants" class="btn btn-lg btn-primary" id="browse">Browse</a>
</div>
@stop