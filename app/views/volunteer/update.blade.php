@extends('layout.master')

@section('title')
Update Information
@stop

@content
{{ Form::open(['route'=> 'participants-edited']) }}
	<div>
		<div>
			{{ Form::label('fname', 'First Name', array('class' => 'form-control')) }}
			{{ Form::text('fname', null, array('placeholder' => 'John', 'class' => 'form-control')) }}
		</div>
		<div>
			{{ Form::label('mname', 'Middle Name', array('class' => 'form-control')) }}
			{{ Form::text('mname', null, array('placeholder' => 'James', 'class' => 'form-control')) }}
		</div>
		<div>
			{{ Form::label('lname', 'Last Name', array('class' => 'form-control')) }}
			{{ Form::text('lname', null, array('placeholder' => 'Smith', 'class' => 'form-control')) }}
		</div>
		<div>
			{{ Form::label('gender', 'Gender', array('class' => 'form-control')) }}
			{{ Form::select('gender', array("Male", "Female", "Other")) }}
		</div>	
		<div>
			{{ Form::label('updateDateOfBirth', 'Date of Birth', array('class' => 'form-control')) }}
			{{ Form::input('date', 'updateDateOfBirth') }}
		</div>
		<div>
			{{ Form::label('nationality', 'Nationality', array('class' => 'form-control')) }}
			{{ Form::text('nationality', null, array('class' => 'form-control')) }}
		</div>
		<div>
			{{ Form::label('address', 'Address', array('class' => 'form-control')) }}
			{{ Form::text('address', null, array('class' => 'form-control')) }}
		</div>
		<div>
			{{ Form::label('native_lang', 'Native Language', array('class' => 'form-control')) }}
			{{ Form::text('native_lang', null, array('class' => 'form-control')) }}
		</div>
		<div>
			{{ Form::label('other_lang', 'Other Lanuages', array('class' => 'form-control')) }}
			{{ Form::text('other_lang', null, array('class' => 'form-control')) }}
		</div>
		<div>
			{{ Form::label('houseHoldID', 'Family Member', array('class' => 'form-control')) }}
			{{ Form::text('houseHoldID', null, array('class' => 'form-control')) }}
		</div>
		<div>
			{{ Form::label('phoneNo', 'Phone Number', array('class' => 'form-control')) }}
			{{ Form::text('phoneNo', null, array('class' => 'form-control')) }}
		</div>
		<div>
			{{ Form::label('email', 'Email', array('class' => 'form-control')) }}
			{{ Form::email('email', null, array('class' => 'form-control')) }}
		</div>
		<div>
			{{ Form::submit('Confirm and Mark', array('class' => 'form-control btn-primary')) }}
		</div>
	</div>
{{ Form::close() }}

{{ HTML::script('//code.jquery.com/jquery-1.10.2.js') }}
<script type="text/javascript">
	$(document).ready(function() {
		$( "#updateDateOfBirth" ).datepicker({//changeMonth: true,
											  //changeYear: true,
											  dateFormat: "dd MM yy"});
	});
</script>

@stop