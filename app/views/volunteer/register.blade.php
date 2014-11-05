<!-- Modal -->
<div id="registerParticipantModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registerParticipantModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
        	<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title" id="registerParticipantModalLabel">New Event
        </h4>
      </div>
      <div class="modal-body">
		{{ Form::open(['route'=> 'participants-created']) }}
			<div>
				<div>
					{{ Form::label('firstName', 'First Name', array('class' => 'form-control')) }}
					{{ Form::text('firstName', null, array('placeholder' => 'John', 'class' => 'form-control')) }}
				</div>
				<div>
					{{ Form::label('middleName', 'Middle Name', array('class' => 'form-control')) }}
					{{ Form::text('middleName', null, array('placeholder' => 'James', 'class' => 'form-control')) }}
				</div>
				<div>
					{{ Form::label('lastName', 'Last Name', array('class' => 'form-control')) }}
					{{ Form::text('lastName', null, array('placeholder' => 'Smith', 'class' => 'form-control')) }}
				</div>
				<div>
					{{ Form::label('gender', 'Gender', array('class' => 'form-control')) }}
					{{ Form::select('gender', array("Male", "Female", "Other")) }}
				</div>	
				<div>
					{{ Form::label('dateOfBirth', 'Date of Birth', array('class' => 'form-control')) }}
					{{ Form::input('date', 'date') }}
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
					{{ Form::label('nativeLanguage', 'Native Language', array('class' => 'form-control')) }}
					{{ Form::text('nativeLanguage', null, array('class' => 'form-control')) }}
				</div>
				<div>
					{{ Form::label('otherLanguages', 'Other Lanuages', array('class' => 'form-control')) }}
					{{ Form::text('otherLanguages', null, array('class' => 'form-control')) }}
				</div>
				<div>
					{{ Form::label('familyMember', 'Family Member', array('class' => 'form-control')) }}
					{{ Form::text('familyMember', null, array('class' => 'form-control')) }}
				</div>
				<div>
					{{ Form::label('phoneNumber', 'Phone Number', array('class' => 'form-control')) }}
					{{ Form::text('phoneNumber', null, array('class' => 'form-control')) }}
				</div>
				<div>
					{{ Form::label('email', 'Email', array('class' => 'form-control')) }}
					{{ Form::email('email', null, array('class' => 'form-control')) }}
				</div>
				<div>
					{{ Form::submit('Register', array('class' => 'form-control btn-primary')) }}
				</div>
			</div>
		{{ Form::close() }}
      </div>
<!--       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div><!--/.modal-content -->
  </div><!--/.modal-dialog-->
</div><!-- /.modal -->