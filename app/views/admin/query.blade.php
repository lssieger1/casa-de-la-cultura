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
						{{ Form::text('fields[]', null, array('class' => 'form-control', 'id'=>'date', 'onchange'=>'test("date", "datecb")')) }}
					</div>
					<div class="input-group">
					<span class="input-group-addon">Location</span>
						{{ Form::text('fields[]', null, array('class' => 'form-control', 'id'=>'location', 'onchange'=>'test("location", "locationcb")')) }}
					</div>
					<div class="input-group">
					<span class="input-group-addon">Gender</span>
						{{ Form::select('gender', array(""=>"", "All"=>"All", "Male"=>"Male", "Female"=>"Female", "Other"=>"Other"), null, array('class' => 'form-control', 'id'=>'gender', 'onchange'=>'test("gender", "gendercb")')) }}
					</div>
					<div class="input-group">
					<span class="input-group-addon">First Name</span>
						{{ Form::text('fields[]', null, array('class' => 'form-control', 'id'=>'fname', 'onchange'=>'test("fname", "fnamecb")')) }}
					</div>
					<div class="input-group">
					<span class="input-group-addon">Middle Name</span>
						{{ Form::text('fields[]', null, array('class' => 'form-control', 'id'=>'mname', 'onchange'=>'test("mname", "mnamecb")')) }}
					</div>
					<div class="input-group">
					<span class="input-group-addon">Last Name</span>
						{{ Form::text('fields[]', null, array('class' => 'form-control', 'id'=>'lname', 'onchange'=>'test("lname", "lnamecb")')) }}
					</div>
					<div class="input-group">
					<span class="input-group-addon">Age Range</span>
						{{ Form::select('age', (array(''=>'', 'All','Under 13', '13-18', '19-21','21+')), null, array('class' => 'form-control', 'id'=>'dob', 'onchange'=>'test("dob", "dobcb")')) }}
					</div>
					<div class="input-group">
					<span class="input-group-addon">Nationality</span>
						{{ Form::text('fields[]', null, array('class' => 'form-control', 'id'=>'nationality', 'onchange'=>'test("nationality", "nationalitycb")')) }}
					</div>
					<div class="input-group">
					<span class="input-group-addon">Language</span>
						{{ Form::text('fields[]', null, array('class' => 'form-control', 'id'=>'language', 'onchange'=>'test("language", "languagecb")')) }}
					</div>
					<div class="input-group">
					<span class="input-group-addon">Address</span>
						{{ Form::text('fields[]', null, array('class' => 'form-control', 'id'=>'address', 'onchange'=>'test("address", "addresscb")')) }}
					</div>
					<div class="input-group">
					<span class="input-group-addon">City</span>
						{{ Form::text('fields[]', null, array('class' => 'form-control', 'id'=>'city', 'onchange'=>'test("city", "citycb")')) }}
					</div>
					<div class="input-group">
					<span class="input-group-addon">State</span>
						{{ Form::stateSelect('fields[]', null, array('class' => 'form-control', 'id'=>'state', 'onchange'=>'test("state", "statecb")')) }}
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
						{{ Form::checkbox('cb[]', 'date/Date', false, array('id'=>'datecb')) }}
						{{ Form::label('dateCB', 'Date') }}
					</div>
					<div>
						{{ Form::checkbox('cb[]', 'location/Location', false, array('id'=>'locationcb')) }}
						{{ Form::label('locationCB', 'Location') }}
					</div>
					<div>
						{{ Form::checkbox('cb[]', 'gender/Gender', false, array('id'=>'gendercb')) }}
						{{ Form::label('genderCB', 'Gender') }}
					</div>
					<div>
						{{ Form::checkbox('cb[]', 'fname/First Name', false, array('id'=>'fnamecb')) }}
						{{ Form::label('firstNameCB', 'First Name') }}
					</div>
					<div>
						{{ Form::checkbox('cb[]', 'mname/Middle Name', false, array('id'=>'mnamecb')) }}
						{{ Form::label('middleNameCB', 'Middle Name') }}
					</div>
					<div>
						{{ Form::checkbox('cb[]', 'lname/Last Name', false, array('id'=>'lnamecb')) }}
						{{ Form::label('lastNameCB', 'Last Name') }}
					</div>
					<div>
						{{ Form::checkbox('cb[]', 'dob/Date of Birth', false, array('id'=>'dobcb')) }}
						{{ Form::label('dobCB', 'Date of Birth') }}
					</div>
					<div>
						{{ Form::checkbox('cb[]', 'nationality/Nationality', false, array('id'=>'nationalitycb')) }}
						{{ Form::label('nationalityCB', 'Nationality') }}
					</div>
					<div>
						{{ Form::checkbox('cb[]', 'native_lang/Language', false, array('id'=>'languagecb')) }}
						{{ Form::label('languageCB', 'Language') }}
					</div>
					<div>
						{{ Form::checkbox('cb[]', 'address/Address', false, array('id'=>'addresscb')) }}
						{{ Form::label('addressCB', 'Address') }}
					</div>
					<div>
						{{ Form::checkbox('cb[]', 'city/City', false, array('id'=>'citycb')) }}
						{{ Form::label('cityCB', 'City') }}
					</div>
					<div>
						{{ Form::checkbox('cb[]', 'state/State', false, array('id'=>'statecb')) }}
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

<script type="text/javascript">
	function check() {
		document.getElementById('gendercb').checked = true;
	}
	function test(field, cb) {
		if (document.getElementById(field).value == "") {
			document.getElementById(cb).checked = false;
		}
		else {
			document.getElementById(cb).checked = true;
		}
	}

</script>
@stop