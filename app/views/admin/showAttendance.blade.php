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
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th class="col-8">
					DATE
				</th>
				<th>
					NAME
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
			@endforeach 
		</tbody>
	</table>
</div>

{{ HTML::script('jquery-1.11.1.js') }}
@stop