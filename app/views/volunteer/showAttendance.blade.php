@extends('layouts.master')

@section('title')
Attendance
@stop

@section('style')
{{ HTML::style('css/dataTables.bootstrap.css') }}
@stop

@section('content')
<p> This is where the attendance will be taken, by displaying all of the participants</p>
<div>
	<button class="btn-sm btn-primary" id="browse">Browse</button>
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
					</tr>
					@endif
			@endforeach
		</tbody>
	</table>
</div>
<div class="pull-right">
	<button class="btn-lg btn-primary" id="browse">Browse</button>
</div>
@stop