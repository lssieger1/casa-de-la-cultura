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
    <table class="table table-striped table-bordered" id="allUsersTable">
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
					ACCOUNT TYPE
				</th>
				<th>
					ACTIONS
				</th>
			</tr>
		</thead>
		<tbody>

			@foreach ($users as $user)				
				<tr>
					<td class="col-sm-3">
						{{ $user->name }}
					</td>
					<td class="col-sm-3">
						{{ $user->username }}
					</td>
					<td class="col-sm-3">
						{{ $user->email }}
					</td>
					<td class="col-sm-3">
						@if( $user->user_type == 1)
							Administrator
						@else
							Volunteer
						@endif
					</td>
					<td class="col-sm-3">
						<div class="btn-group-vertical" role="group" aria-label="...">
							<input type="hidden" name="user_id" value = "{{ $user->id }}">
							<a class="btn btn-warning" href = 'updateUserInformation/{{ $user->id }}'> Update Information </a>
							<a class="btn btn-primary" href = 'resetPassword/{{ $user->id }}'> Reset Password </a>
							<a class="btn btn-danger" href = 'deleteUser/{{ $user->id }}' onclick="if(!confirm('Are you sure you want to delete this user?')){return false;}"> Delete User </a>
						</div>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop