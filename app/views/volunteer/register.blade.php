
<!-- Modal -->
<div id="registerParticipantModal" class="modal fade" tabindex="-1" role="dialog" 
		aria-labelledby="registerParticipantModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
        	<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title" id="registerParticipantModalLabel">New Participant</h4>
      </div>
      <div class="modal-body">

		{{ Form::open(['route'=> 'participants-created']) }}
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
					{{ Form::select('gender', array("Male", "Female", "Other"), null, array('class'=>'form-control')) }}
				</div>	
				<div>
					{{ Form::label('registerDateOfBirth', 'Date of Birth', array('class' => 'form-control')) }}
					{{ Form::input('date', 'registerDateOfBirth', null, array('class'=>'form-control')) }}
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
					{{ Form::label('city', 'City', array('class' => 'form-control')) }}
					{{ Form::text('city', null, array('class' => 'form-control')) }}
				</div>
				<div>
					{{ Form::label('state', 'State', array('class' => 'form-control')) }}
					{{ Form::text('state', null, array('class' => 'form-control')) }}
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
					{{ Form::label('houseHoldID', 'Parent/Guardian', array('class' => 'form-control')) }}
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
					{{ Form::label('eventType', 'eventType', array('class' => 'form-control')) }}
					{{ Form::text('eventType', null, array('class' => 'form-control')) }}
				</div>
				<div>
					{{ Form::submit('Register', array('class' => 'form-control btn-primary')) }}
				</div>
			</div>
		{{ Form::close() }}
      </div>
    </div><!--/.modal-content -->
  </div><!--/.modal-dialog-->
</div><!-- /.modal -->

{{ HTML::script('//code.jquery.com/jquery-1.10.2.js') }}
<script type="text/javascript">
	$(document).ready(function() {
		$( "#registerDateOfBirth" ).datepicker({//changeMonth: true,
											    //changeYear: true,
											    dateFormat: "dd MM yy"});
	});
</script>

