{{ Form::open() }}
	<div>
		<div>
			{{ Form::label('firstName', 'First Name') }}
			{{ Form::text('firstName') }}
		</div>
		<div>
			{{ Form::label('middleName', 'Middle Name')}}
			{{ Form::text('middleName') }}
		</div>
		<div>
			{{ Form::label('lastName', 'Last Name') }}
			{{ Form::text('lastName') }}
		</div>
		<div>
			{{ Form::label('gender', 'Gender') }}
			{{ Form::select('gender', array("Male", "Female", "Other")) }}
		</div>	
		<div>
			{{ Form::label('dateOfBirth', 'Date of Birth') }}
			{{ Form::input('date', 'date') }}
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
			{{ Form::label('nativeLanguage', 'Native Language') }}
			{{ Form::text('nativeLanguage') }}
		</div>
		<div>
			{{ Form::label('otherLanguages', 'Other Lanuages') }}
			{{ Form::text('otherLanguages') }}
		</div>
		<div>
			{{ Form::label('familyMember', 'Family Member') }}
			{{ Form::text('familyMember') }}
		</div>
		<div>
			{{ Form::label('phoneNumber', 'Phone Number') }}
			{{ Form::text('phoneNumber') }}
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