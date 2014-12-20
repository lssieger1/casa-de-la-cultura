
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
							"Other", array('class'=>'form-control')) }}
				</div>	
				<div class="input-group">
					<span class="input-group-addon">Date of Birth</span>
					{{ Form::input('text', 'registerDateOfBirth', null, array('class'=>'form-control', 'id'=>'registerDateOfBirth')) }}
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
		$( "#registerDateOfBirth" ).datepicker({changeMonth: true,
											    changeYear: true,
											    dateFormat: "dd MM yy",
											    yearRange: "-90:+0"});
		var enforceModalFocusFN = $.fn.modal.Constructor.prototype.enforceFocus;
		$('#registerParticipantModal').on('show.bs.modal', function() {
			$.fn.modal.Constructor.prototype.enforceFocus = function(){};
		});
		$('#registerParticipantModal').on('hide.bs.modal', function() {
			$.fn.modal.Constructor.prototype.enforceFocus = enforceModalFocusFN;
		});
	});
</script>

