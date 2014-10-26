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
			<tr>
				<td>
					This is 
				</td>
				<td>
					where the
				</td>
				<td>
					user info will be
				</td>
				<td>
					<button class="btn btn-primary"> 
						Update
					</button>
				</td>
			</tr>
			<tr>
				<td>
					Linking the  
				</td>
				<td>
					buttons may be
				</td>
				<td>
					a little fun
				</td>
				<td>
					<button class="btn btn-primary"> 
						Update
					</button>
				</td>
			</tr>
			<tr>
				<td>
					This is 
				</td>
				<td>
					where the
				</td>
				<td>
					user info will be
				</td>
				<td>
					<button class="btn btn-primary"> 
						Update
					</button>
				</td>
			</tr>
		</tbody>
	</table>
</div>

@stop