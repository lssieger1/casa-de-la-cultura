@extends('layouts.master')

@section('title')
Run Queries
@stop

@section('content')

// two columns
{{ Form::open(['route'=> 'runQuery']) }}
<div class="panel">
	<div class="panel-title">
		Enter query filters:
	</div>
	<div class="panel-body">
		// left side entering query specifics
		// better way than hard-coding?
		<div>
			{{ Form::label('eventType', 'Event Type: ') }}
			{{ Form::text('eventType', null) }}
		</div>
		<div>
			{{ Form::label('date', 'Event Date: ') }}
			{{ Form::text('date', null) }}
		</div>
		<div>
			{{ Form::label('location', 'Event Location: ') }}
			{{ Form::text('location', null) }}
		</div>
		<div>
			{{ Form::label('gender', 'Gender: ') }}
			{{ Form::text('gender', null) }}
		</div>
		<div>
			{{ Form::label('firstName', 'First Name: ') }}
			{{ Form::text('firstName', null) }}
		</div>
		<div>
			{{ Form::label('middleName', 'Middle Name: ') }}
			{{ Form::text('middleName', null) }}
		</div>
		<div>
			{{ Form::label('lastName', 'Last Name: ') }}
			{{ Form::text('lastName', null) }}
		</div>
		<div>
			<!-- should be a year/month maybe? -->
			{{ Form::label('dob', 'Date of Birth: ') }} 
			{{ Form::text('dob', null) }}
		</div>
		<div>
			{{ Form::label('pob', 'Place of Birth: ') }}
			{{ Form::text('pob', null) }}
		</div>
		<div>
			{{ Form::label('nationality', 'Nationality: ') }}
			{{ Form::text('nationality', null) }}
		</div>
		<div>
			{{ Form::label('language', 'Language: ') }}
			{{ Form::text('language', null) }}
		</div>
		<div>
			{{ Form::label('address', 'Address: ') }}
			{{ Form::text('address', null) }}
		</div>
		<div>
			{{ Form::label('city', 'City: ') }}
			{{ Form::text('city', null) }}
		</div>
		<div>
			{{ Form::label('state', 'State: ') }}
			{{ Form::text('state', null) }}
		</div>
		<div>
			{{ Form::label('email', 'Email: ') }}
			{{ Form::text('email', null) }}
		</div>
		<div>
				{{ Form::submit('Submit', array('class' => 'form-control btn-primary')) }}
			</div>
	</div>
</div>

// right side entering retrieval shown
<div class="panel">
	<div class="panel-title">
		Choose what to see in the report:
	</div>
	<div class="panel-body">
		<div>
			{{ Form::checkbox('dateCB', 'dateCB') }}
			{{ Form::label('dateCB', 'Date') }}
		</div>
		<div>
			{{ Form::checkbox('locationCB', 'locationCB') }}
			{{ Form::label('locationCB', 'Location') }}
		</div>
		<div>
			{{ Form::checkbox('genderCB', 'genderCB') }}
			{{ Form::label('genderCB', 'Gender') }}
		</div>
		<div>
			{{ Form::checkbox('firstNameCB', 'firstNameCB') }}
			{{ Form::label('firstNameCB', 'First Name') }}
		</div>
		<div>
			{{ Form::checkbox('middleNameCB', 'middleNameCB') }}
			{{ Form::label('middleNameCB', 'Middle Name') }}
		</div>
		<div>
			{{ Form::checkbox('lastNameCB', 'lastNameCB') }}
			{{ Form::label('lastNameCB', 'Last Name') }}
		</div>
		<div>
			{{ Form::checkbox('dobCB', 'dobCB') }}
			{{ Form::label('dobCB', 'Date of Birth') }}
		</div>
		<div>
			{{ Form::checkbox('pobCB', 'pobCB') }}
			{{ Form::label('pobCB', 'Place of Birth') }}
		</div>
		<div>
			{{ Form::checkbox('nationalityCB', 'nationalityCB') }}
			{{ Form::label('nationalityCB', 'Nationality') }}
		</div>
		<div>
			{{ Form::checkbox('languageCB', 'languageCB') }}
			{{ Form::label('languageCB', 'Language') }}
		</div>
		<div>
			{{ Form::checkbox('addressCB', 'addressCB') }}
			{{ Form::label('addressCB', 'Address') }}
		</div>
		<div>
			{{ Form::checkbox('cityCB', 'cityCB') }}
			{{ Form::label('cityCB', 'City') }}
		</div>
		<div>
			{{ Form::checkbox('stateCB', 'stateCB') }}
			{{ Form::label('stateCB', 'State') }}
		</div>
		<div>
			{{ Form::checkbox('emailCB', 'emailCB') }}
			{{ Form::label('emailCB', 'Email') }}
		</div>
	</div>
</div>

{{ Form::close() }}
@stop