@extends('layouts.master')

@section('title')
Attendance
@stop

@section('style')
{{ HTML::style('css/dataTables.bootstrap.css') }}
@stop

@section('content')
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
						<table>
							<tr>
								<td>
									@if($records == null)	
										{{ Form::open(['url'=> '/takeAttendance']) }}
											<input type="hidden" name="part_id" value = "{{ $participant->part_id }}">
											<input type="hidden" name="event_id" value = "{{ $event_id }}">  
											<button name="takeAttendance"  class="btn btn-primary">Take Attendance</button>
											<!-- Redirect to previous page -->
										{{ Form::close() }}	
									@else
										<button type="button" disabled>Attendance Taken!</button>
									@endif
								</td>
								<td>
									<span>&nbsp;</span>
								</td>
								<td>
									{{ Form::open() }}
										<input type="hidden" name="part_id" value = "{{ $participant->part_id }}">
										<input type="hidden" name="event_id" value = "{{ $event_id }}">  
										<button name="updateParticipant"  class="btn btn-primary">Update Info</button>	
									{{ Form::close() }}
								</td>
							</tr>
						</table>
					</td>
				</tr>
				@endif
			@endforeach
		</tbody>
	</table>
</div>
@stop