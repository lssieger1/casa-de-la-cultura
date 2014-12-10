@extends('layouts.master')

@section('title')

All Users

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
					USERNAME
				</th>
				<th>
					EMAIL
				</th>
				<th>
					UPDATE INFORMATION
				</th>
				<th>
					RESET PASSWORD
				</th>
			</tr>
		</thead>
		<tbody>

			@foreach ($users as $user)				
				<tr>
					<td>
						{{ $user->name }}
					</td>
					<td>
						{{ $user->username }}
					</td>
					<td>
						{{ $user->email }}
					</td>
					<td>
						
							<input type="hidden" name="user_id" value = "{{ $user->id }}">
							<button name="updateInfo"  class="btn btn-primary">Update Information</button>	
							<a href = 'updateUserInformation/{{ $user->id }}' > Update Information </a>			 
						
					</td>
					<td>
						
							<input type="hidden" name="user_id" value = "{{ $user->id }}">
							<button name="resetPassword"  class="btn btn-primary">Reset Password</button>				 
							<a href = 'resetPassword/{{ $user->id }}' > Reset Password </a>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>
</div>
@stop