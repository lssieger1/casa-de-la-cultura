@extends('layouts.master')

@section('title')
Update Information
@stop

@section('content')
{{ Form::model($participant, array('route' => array('attendance.update', $participant->part_id), 'method' => 'PUT')) }}
	<div>
		<div class="input-group">
			<span class="input-group-addon">First Name</span>
			{{ Form::text('fname', null, array('required'=>'required', 'class' => 'form-control')) }}
		</div>
		<div class="input-group">
			<span class="input-group-addon">Middle Name</span>
			{{ Form::text('mname', null, array('class' => 'form-control')) }}
		</div>
		<div class="input-group">
			<span class="input-group-addon">Last Name</span>
			{{ Form::text('lname', null, array('required'=>'required', 'class' => 'form-control')) }}
		</div>
		<div class="input-group">
			<span class="input-group-addon">Gender</span>
			{{ Form::select('gender', array("Male" => "Male", "Female" => "Female", "Other" => "Other"), 
					$participant->gender, array('class'=>'form-control')) }}
		</div>	
		<div class="input-group">
			<span class="input-group-addon">Date of Birth</span>
			{{ Form::input('text', 'dob', null, array('class'=>'form-control', 'id'=>'dob')) }}
		</div>
		<div class="input-group">
			<span class="input-group-addon">Nationality</span>
			{{ Form::text('nationality', null, array('class' => 'form-control')) }}
		</div>
		<div class="input-group">
			<span class="input-group-addon">Address</span>
			{{ Form::text('address', null, array('class' => 'form-control')) }}
		</div>
		<div class="input-group">
			<span class="input-group-addon">City</span>
			{{ Form::text('city', null, array('class' => 'form-control')) }}
		</div>
		<div class="input-group">
			<span class="input-group-addon">State</span>
			{{ Form::stateSelect('state', null, array('class' => 'form-control')) }}
		</div>
		<div class="input-group">
			<span class="input-group-addon">Native Language</span>
			{{ Form::text('native_lang', null, array('class' => 'form-control')) }}
		</div>
		<div class="input-group">
			<span class="input-group-addon">Other Languages</span>
			{{ Form::text('other_lang', null, array('class' => 'form-control')) }}
		</div>
		<div class="input-group">
			<span class="input-group-addon">Parent/Guardian</span>
			{{ Form::text('guardian', null, array('class' => 'form-control')) }}
		</div>
		<div class="input-group">
			<span class="input-group-addon">Phone Number</span>
			{{ Form::text('phoneNo', null, array('class' => 'form-control')) }}
		</div>
		<div class="input-group">
			<span class="input-group-addon">Email</span>
			{{ Form::email('email', null, array('class' => 'form-control')) }}
		</div>
		<div>
			{{ Form::submit('Update', array('class' => 'form-control btn-primary')) }}
		</div>
	</div>
{{ Form::close() }}

{{ HTML::script('//code.jquery.com/jquery-1.10.2.js') }}
<script type="text/javascript">
	$(document).ready(function() {
		$( "#dob" ).datepicker({changeMonth: true,
								changeYear: true,
								dateFormat: "dd MM yy",
								yearRange: "-90:+0"});
	});
</script>

@stop