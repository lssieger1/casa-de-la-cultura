@extends('layouts.master')

@section('title')
Run Queries
@stop

@section('content')

// two columns
{{ Form::open(['route'=> 'runQuery']) }}
	<div class="row">
		<div class="col-lg-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">
						<b>Enter Query Filters:</b>
					</div>
				</div>
				<div class="panel-body">
					// left side entering query specifics
					// better way than hard-coding?
					<div>
						{{ Form::label('eventType', 'Event Type: ', array('class' => 'form-control')) }}
						{{ Form::select('eventType', (EventType::all()->lists('type_name','type_id')+ array("None","None")), array('class' => 'form-control')) }}
					</div>
					<div>
						{{ Form::label('date', 'Event Date: ', array('class' => 'form-control')) }}
						{{ Form::text('date', null, array('class' => 'form-control')) }}
					</div>
					<div>
						{{ Form::label('location', 'Event Location: ', array('class' => 'form-control')) }}
						{{ Form::text('location', null, array('class' => 'form-control')) }}
					</div>
					<div>
						{{ Form::label('gender', 'Gender: ', array('class' => 'form-control')) }}
						{{ Form::select('gender', array("None","Male", "Female", "Other"), array('class' => 'form-control')) }}
					</div>
					<div>
						{{ Form::label('firstName', 'First Name: ', array('class' => 'form-control')) }}
						{{ Form::text('firstName', null, array('class' => 'form-control')) }}
					</div>
					<div>
						{{ Form::label('middleName', 'Middle Name: ', array('class' => 'form-control')) }}
						{{ Form::text('middleName', null, array('class' => 'form-control')) }}
					</div>
					<div>
						{{ Form::label('lastName', 'Last Name: ', array('class' => 'form-control')) }}
						{{ Form::text('lastName', null, array('class' => 'form-control')) }}
					</div>
					<div>
						<!-- should be a year/month maybe? -->
						{{ Form::label('dob', 'Date of Birth: ', array('class' => 'form-control')) }} 
						{{ Form::text('dob', null, array('class' => 'form-control')) }}
					</div>
					<div>
						{{ Form::label('pob', 'Place of Birth: ', array('class' => 'form-control')) }}
						{{ Form::text('pob', null, array('class' => 'form-control')) }}
					</div>
					<div>
						{{ Form::label('nationality', 'Nationality: ', array('class' => 'form-control')) }}
						{{ Form::text('nationality', null, array('class' => 'form-control')) }}
					</div>
					<div>
						{{ Form::label('language', 'Language: ', array('class' => 'form-control')) }}
						{{ Form::text('language', null, array('class' => 'form-control')) }}
					</div>
					<div>
						{{ Form::label('address', 'Address: ', array('class' => 'form-control')) }}
						{{ Form::text('address', null, array('class' => 'form-control')) }}
					</div>
					<div>
						{{ Form::label('city', 'City: ', array('class' => 'form-control')) }}
						{{ Form::text('city', null, array('class' => 'form-control')) }}
					</div>
					<div>
						{{ Form::label('state', 'State: ', array('class' => 'form-control')) }}
						{{ Form::text('state', null, array('class' => 'form-control')) }}
					</div>
					<div>
						{{ Form::label('email', 'Email: ', array('class' => 'form-control')) }}
						{{ Form::email('email', null, array('class' => 'form-control')) }}
					</div>
				</div>
			</div>
		</td>
	</div>
	<div class="row">
		<div class="col-lg-4">
			// right side entering retrieval shown
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">
						<b>Choose what to see in the report:</b>
					</div>
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
					<div class='panel-footer'>
					{{ Form::submit('Submit', array('class' => 'form-control btn-primary')) }}
					</div>
				</div>
			</div>
		</div>
	</div>
{{ Form::close() }}
@stop