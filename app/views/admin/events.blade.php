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
					NAME (TYPE)
				</th>
				<th>
					DATE AND LOCATION
				</th>
				<th>
					DESCRIPTION
				</th>
				<th>
					ACTIONS
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
					event info will be
				</td>
				<td>
					<button class="btn btn-primary">Update</button>
					<button class="btn btn-primary">Attendance</button>
					<button class="btn btn-primary">Delete</button>
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
					<button class="btn btn-primary">Update</button>
					<button class="btn btn-primary">Attendance</button>
					<button class="btn btn-primary">Delete</button>
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
					event info will be
				</td>
				<td>
					<button class="btn btn-primary">Update</button>
					<button class="btn btn-primary">Attendance</button>
					<button class="btn btn-primary">Delete</button>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@stop