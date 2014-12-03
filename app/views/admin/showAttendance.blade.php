@extends('layouts.master')

@section('title')
Admin Homepage
@stop

@section('style')
{{ HTML::style('css/dataTables.bootstrap.css') }}
@stop

@section('content')

<div class="table-responsive">
	<table class="table table-bordered table-striped">
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
					{{ $eventList->date}}
				</td>
				<td class="col-sm-3">
					{{ $attendance->fname }} {{ $attendance->lname }}
				</td>
			</tr>
			<!-- should look similar to other attendance view (i.e. should show name, address, dob, phoneNumber) -->
			@endforeach 
		</tbody>
	</table>
</div>

{{ HTML::script('jquery-1.11.1.js') }}
@stop