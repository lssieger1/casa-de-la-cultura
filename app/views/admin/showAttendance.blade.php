@extends('layouts.master')

@section('title')
Attendance for {{ $event->get_date() }} {{ $event->EventType->type_name }}
@stop

@section('style')
{{ HTML::style('css/dataTables.bootstrap.css') }}
@stop

@section('content')

<div class="table-responsive">
	<table class="table table-bordered table-striped" id="showAttendanceTable">
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
			@foreach  ($attendances as $attendance)
			<tr>
				<td class="col-sm-3">
					{{ $attendance->Participant->fname}}  {{ $attendance->Participant->lname }}
				</td>
				<td class="col-sm-3">
					{{ $attendance->Participant->dob }}
				</td>
				<td class="col-sm-3">
					{{ $attendance->Participant->phoneNo }}
				</td>
				<td class="col-sm-3">
					{{ $attendance->Participant->address }}
				</td>
			</tr>
			@endforeach 
		</tbody>
	</table>
</div>
@stop