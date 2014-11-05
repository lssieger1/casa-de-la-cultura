{{ Form::open(['route'=> 'participants-created']) }}
	<div>
		<div>
			{{ Form::label('fname', 'First Name') }}
			{{ Form::text('fname') }}
		</div>
		<div>
			{{ Form::label('mname', 'Middle Name')}}
			{{ Form::text('mname') }}
		</div>
		<div>
			{{ Form::label('lname', 'Last Name') }}
			{{ Form::text('lname') }}
		</div>
		<div>
			{{ Form::label('gender', 'Gender') }}
			{{ Form::select('gender', array("Male", "Female", "Other")) }}
		</div>	
		<div>
			{{ Form::label('dob', 'Date of Birth') }}
			{{ Form::input('date','date') }}
		</div>
		<div>
			{{ Form::label('nationality', 'Nationality') }}
			{{ Form::text('nationality') }}
		</div>
		<div>
			{{ Form::label('address', 'Address') }}
			{{ Form::text('address') }}
		</div>
		<div>
			{{ Form::label('native_lang', 'Native Language') }}
			{{ Form::text('native_lang') }}
		</div>
		<div>
			{{ Form::label('other_lang', 'Other Lanuages') }}
			{{ Form::text('other_lang') }}
		</div>
		<div>
			{{ Form::label('houseHoldID', 'Family Member') }}
			{{ Form::text('houseHoldID') }}
		</div>
		<div>
			{{ Form::label('phoneNo', 'Phone Number') }}
			{{ Form::text('phoneNo') }}
		</div>
		<div>
			{{ Form::label('email', 'Email') }}
			{{ Form::email('email') }}
		</div>
		<div>
			{{ Form::submit('Register') }}
		</div>
	</div>
{{ Form::close() }}