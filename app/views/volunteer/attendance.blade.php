@extends('layouts.master')

@section('title')
Attendance
@stop

@section('style')
{{ HTML::style('css/dataTables.bootstrap.css') }}
@stop

@section('content')
<p> This is where the attendance will be taken, by displaying all of the participants</p>

<!-- Still trying to decide what table format to use 
        you can safely start working on displaying the 
        participants. -->
 <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover" id="attendanceTable">
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
					CHECK INFO
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach  ($participants as $participant)			
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
				<?php $part_id = $participant->part_id;
					  
					  $records =  DB::table('attendance')->where('part_id', '=', $part_id)
					  										->where('event_id', '=', $event_id)
					  										->get();
				?>
				<td>
					@if($records== null)
						{{ Form::open(['url'=> '/takeAttendance' ]) }}
							<input type="hidden" name="part_id" value = "{{$participant->part_id}}">
							<input type="hidden" name="event_id" value = "<?php echo $event_id ?>">  
							<button name = "/takeAttendance"  class="btn btn-primary">Update</button>				 
						{{ Form::close() }}
					@else
						<button name = "/takeAttendance"  class="btn btn-primary" type="button" disabled>Update</button>
					@endif
				</td>
			</tr>
			@endforeach 
		</tbody>
	</table>
</div>
@stop