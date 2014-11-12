<!-- Modal -->
<div id="editEventModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editEventModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
        	<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title" id="editEventModalLabel">Edit Event
        </h4>
      </div>
      <div class="modal-body">
		{{ Form::open(['route'=> 'event-edited']) }}
			<div>
				{{ Form::label('eventType', 'Event Type: ') }}
				{{ Form::select('eventType', EventType::all()->lists('type_name','type_id'), array('class' => 'form-control')) }}

				{{ Form::text('other', null, array('placeholder' => 'Other', 'class' => 'form-control')) }} <!-- validation needed if Other is selected to make sure this is filled in -->
				{{ $errors->first('other') }}
			</div>
			<div>
				{{ Form::label('date2', 'Date: ', array('class' => 'form-control')) }}
				<!-- {{ Form::selectMonth('month') }} -->
				{{ Form::input('date', 'date2') }}
				{{ $errors->first('date') }}
			</div>
			<div>
				{{ Form::label('location', 'Location: ', array('class' => 'form-control')) }}
				{{ Form::text('location', $eventList->location, array('class' => 'form-control')) }}
				{{ $errors->first('location') }}
			</div>
			<div>
				{{ Form::file('image') }}
				<img src="/favicon.ico"\>
			</div>
			<div>
				{{ Form::label('description2', 'Description: ', array('class' => 'form-control')) }}
				<!-- <input type="text" id="description" name="description" value=""> -->
				{{ Form::textarea('description', $eventList->description, array('class' => 'form-control', 'resize' => 'none')) }}
			</div>
			<div>
				{{ Form::submit('Submit', array('class' => 'form-control btn-primary')) }}
			</div>
		{{ Form::close() }}
      </div>
<!--       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div><!--/.modal-content -->
  </div><!--/.modal-dialog-->
</div><!-- /.modal-->

{{ HTML::script('//code.jquery.com/jquery-1.10.2.js') }}
<script type="text/javascript">
	$(document).ready(function() {
		$( "#date2" ).datepicker({dateFormat: "dd MM yy"});
	});
</script>