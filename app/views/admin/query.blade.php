@extends('layouts.master')

@section('title')
Generate Report
@stop

@section('content')

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
					<div class="input-group">
					<span class="input-group-addon">Program</span>
						{{ Form::select('eventType', (array("All")+EventType::all()->lists('type_name','type_id')), null, array('class' => 'form-control')) }}
					</div>
					<div class="input-group">
					<span class="input-group-addon">Event Date</span>
						{{ Form::text('fields[]', null, array('class' => 'form-control')) }}
					</div>
					<div class="input-group">
					<span class="input-group-addon">Location</span>
						{{ Form::text('fields[]', null, array('class' => 'form-control', 'id'=>'location')) }}
					</div>
					<div class="input-group">
					<span class="input-group-addon">Gender</span>
						{{ Form::select('gender', array("None","Male", "Female", "Other"), null, array('class' => 'form-control')) }}
					</div>
					<div class="input-group">
					<span class="input-group-addon">First Name</span>
						{{ Form::text('fields[]', null, array('class' => 'form-control')) }}
					</div>
					<div class="input-group">
					<span class="input-group-addon">Middle Name</span>
						{{ Form::text('fields[]', null, array('class' => 'form-control')) }}
					</div>
					<div class="input-group">
					<span class="input-group-addon">Last Name</span>
						{{ Form::text('fields[]', null, array('class' => 'form-control')) }}
					</div>
					<div class="input-group">
					<span class="input-group-addon">Age Range</span>
						{{ Form::select('age', (array('All','Under 13', '13-18', '19-21','21+')), 0, array('class' => 'form-control')) }}
					</div>
					<div class="input-group">
					<span class="input-group-addon">Nationality</span>
						{{ Form::text('fields[]', null, array('class' => 'form-control')) }}
					</div>
					<div class="input-group">
					<span class="input-group-addon">Language</span>
						{{ Form::text('fields[]', null, array('class' => 'form-control')) }}
					</div>
					<div class="input-group">
					<span class="input-group-addon">Address</span>
						{{ Form::text('fields[]', null, array('class' => 'form-control')) }}
					</div>
					<div class="input-group">
					<span class="input-group-addon">City</span>
						{{ Form::text('fields[]', null, array('class' => 'form-control')) }}
					</div>
					<div class="input-group">
					<span class="input-group-addon">State</span>
						{{ Form::stateSelect('fields[]', null, array('class' => 'form-control')) }}
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">
						<b>Choose what to see in the report:</b>
					</div>
				</div>
				<div class="panel-body">
					<div>
						{{ Form::checkbox('cb[]', 'date/Date') }}
						{{ Form::label('dateCB', 'Event Date') }}
					</div>
					<div>
						{{ Form::checkbox('cb[]', 'location/Location') }}
						{{ Form::label('locationCB', 'Location') }}
					</div>
					<div>
						{{ Form::checkbox('cb[]', 'gender/Gender') }}
						{{ Form::label('genderCB', 'Gender') }}
					</div>
					<div>
						{{ Form::checkbox('cb[]', 'fname/First Name') }}
						{{ Form::label('firstNameCB', 'First Name') }}
					</div>
					<div>
						{{ Form::checkbox('cb[]', 'mname/Middle Name') }}
						{{ Form::label('middleNameCB', 'Middle Name') }}
					</div>
					<div>
						{{ Form::checkbox('cb[]', 'lname/Last Name') }}
						{{ Form::label('lastNameCB', 'Last Name') }}
					</div>
					<div>
						{{ Form::checkbox('cb[]', 'dob/Date of Birth') }}
						{{ Form::label('dobCB', 'Date of Birth') }}
					</div>
					<div>
						{{ Form::checkbox('cb[]', 'nationality/Nationality') }}
						{{ Form::label('nationalityCB', 'Nationality') }}
					</div>
					<div>
						{{ Form::checkbox('cb[]', 'native_lang/Language') }}
						{{ Form::label('languageCB', 'Language') }}
					</div>
					<div>
						{{ Form::checkbox('cb[]', 'address/Address') }}
						{{ Form::label('addressCB', 'Address') }}
					</div>
					<div>
						{{ Form::checkbox('cb[]', 'city/City') }}
						{{ Form::label('cityCB', 'City') }}
					</div>
					<div>
						{{ Form::checkbox('cb[]', 'state/State') }}
						{{ Form::label('stateCB', 'State') }}
					</div>
					<div>
						{{ Form::checkbox('cb[]','email/Email') }}
						{{ Form::label('emailCB', 'Email') }}
					</div>
					<div class='panel-footer'>
						{{ Form::submit('Run Report', array('class' => 'form-control btn-primary')) }}
					</div>
				</div>
			</div>
		</div>
	</div>
{{ Form::close() }}
@stop