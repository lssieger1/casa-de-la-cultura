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
			<div>
				{{ Form::label('eventType', 'Event Type: ') }}
				{{ Form::select('eventType', EventType::all()->lists('type_name','type_id') + array('other' => 'Other'),
							 array('class' => 'form-control')) }}
				{{ Form::text('other', null, array('placeholder' => 'Other', 'class' => 'form-control')) }}
				 <!-- validation needed if Other is selected to make sure this is filled in -->
				{{ $errors->first('other') }}
			</div>
			<div>
				{{ Form::label('date', 'Date: ', array('class' => 'form-control')) }}
				<!-- {{ Form::selectMonth('month') }} -->
				{{ Form::input('date', 'date') }}
				{{ $errors->first('date') }}
			</div>
			<div>
				{{ Form::label('location', 'Location: ', array('class' => 'form-control')) }}
				{{ Form::text('location', null, array('class' => 'form-control')) }}
				{{ $errors->first('location') }}
			</div>
			<!-- <div>
				{{ Form::file('image') }}
				<img src="/favicon.ico"\>
			</div> -->
			<div>
				{{ Form::label('description', 'Description: ', array('class' => 'form-control')) }}
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
		$( "#date" ).datepicker({dateFormat: "dd MM yy"});
	});
</script>