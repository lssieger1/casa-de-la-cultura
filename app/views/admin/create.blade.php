<!-- Modal -->
<div id="createEventModal" class="modal fade" tabindex="-1" role="dialog"
		 aria-labelledby="createEventModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
        	<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title" id="createEventModalLabel">New Event
        </h4>
      </div>
      <div class="modal-body">
		{{ Form::open(['route'=> 'events-created']) }}	
			<div class='input-group'>
				<span class='input-group-addon'>Program</span>
				{{ Form::select('eventType', (EventType::all()->lists('type_name','type_id') + 
					array('Other')), 0, array('class' => 'form-control', 'required'=>'required')) }}

				{{ Form::text('other', null, array('placeholder' => 'Other',
											'class' => 'form-control event-edit-description')) }} 
				 <!-- validation needed if Other is selected to make sure this is filled in -->
				{{ $errors->first('other') }}
			</div>
			<div class='input-group'>
				<span class='input-group-addon'>Date</span>
				{{ Form::input('text', 'eventDate', null, array('class'=>'form-control', 'required'=>'required')) }}
				{{ $errors->first('date') }}
			</div>
			<div class='input-group'>
				<span class='input-group-addon'>Location</span>
				{{ Form::text('location', null, array('class'=>'form-control', 'required'=>'required')) }}
				{{ $errors->first('location') }}
			</div>
			<!-- <div>
				{{ Form::file('image') }}
				<img src="/favicon.ico"\>
			</div> -->
			<div class='input-group'>
				<span class='input-group-addon'>Description</span>
				{{ Form::textarea('description', null, array('class' => 'form-control', 'resize' => 'none')) }}
			</div>
			<div>
				{{ Form::submit('Submit', array('class' => 'form-control btn-primary')) }}
			</div>
		{{ Form::close() }}
      </div>
    </div><!--/.modal-content -->
  </div><!--/.modal-dialog-->
</div><!-- /.modal-->

{{ HTML::script('//code.jquery.com/jquery-1.10.2.js') }}
<script type="text/javascript">
	$(document).ready(function() {
		$( "#eventDate" ).datepicker({changeMonth: true,
									  changeYear: true,
									  dateFormat: "dd MM yy",
									  yearRange: "-2:+2"});
	});
</script>