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
					Event ID
				</th>
				<th>
					Event Date
				</th>
				<th>
					Participant
				</th>
			</tr>
		</thead>
		<tbody>
				
			@foreach  ($attendances as $attendance)			
			<tr>
				<td>
					{{ $attendance->event_id}}  
				</td>
				<td>
					{{ $attendance->eventList->date}}  
				</td>
				<td>
					<?php
						$part_id = $attendance->part_id;
						$fname = Participant::find($part_id)->fname;
						$lname = Participant::find($part_id)->lname;
						echo "$fname $lname";
					?>
				</td>

				
			</tr>
			@endforeach 

		</tbody>
	</table>
</div>
@stop