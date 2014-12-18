@extends('layouts.master')

@section('title')
Attendance
@stop

@section('style')
{{ HTML::style('css/dataTables.bootstrap.css') }}
{{ HTML::style('css/custom.css') }}
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
					SELECT
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
						{{ $participant->dob}}
					</td>
					<td>
						{{ $participant->phoneNo }}
					</td>
					<td>
						{{ $participant->address }}
					</td>
					<td>
						{{Form::open(['browseAllPart'])}}
							<input type="hidden" name="part_id" value = "{{ $participant->part_id }}">  
							{{ Form::submit("Select", array('class'=>'btn btn-primary')) }}
						{{Form::close()}}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop