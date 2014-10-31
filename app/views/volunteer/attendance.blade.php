@extends('layouts.master')

@section('title')
Attendance
@stop

@section('content')
<p> This is where the attendance will be taken, by displaying all of the participants</p>

<!-- Still trying to decide what table format to use 
        you can safely start working on displaying the 
        participants. -->
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
					CHECK INFO
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach  ($participants as $participant)			
			<tr>
				<td>
					{{ $participant->fname}}{{ $participant->lname}}  
				</td>
				<td>
					{{ $participant->dob}}
				</td>
				<td>
					{{ $participant->phoneNo}}
				</td>
				<td>
					<button class="btn btn-primary"> 
						Update
					</button>
				</td>
			</tr>
			@endforeach 
			
		</tbody>
	</table>
</div>

@stop