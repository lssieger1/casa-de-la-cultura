@extends('layouts.master')

@section('title')
@parent
{{ $event }} Events
@stop

@section('style')
{{ HTML::style('css/grid.css') }}
@stop

@section('content')
<h3>Public Events  </h3>
<div>
  {{ Form::model($eventLists, array('url' => '/eventSort', 'method' => 'get')) }}
    {{ Form:: label('event_type', 'Sort By: ') }}
    {{ Form:: select('event_id', (array('All') + EventType::all()->lists('type_name','type_id')
       )) }}

    {{ Form::submit('Filter') }}
  {{ Form::close() }}
</div>

  @foreach  ($eventLists as $eventList)
  <div class="col-xs-8 col-sm-3">
    <div>
      <label> {{ $eventList->EventType->type_name }}</label>
      <p> {{ $eventList->description }}</p>
      <label> {{ $eventList->get_date() }}</label>
      <?php 
      $check =  date("Y-m-d");
      ?>
      @if(Auth::check()) 
      @if($eventList->date > $check )
       <br><button type="button" class="btn btn-primary" disabled>Attendance</button> 
      @else
        <br><a href = "attendance/{{$eventList->event_id}}" class="btn btn-primary">Attendance</a>

        @endif

         <!-- needs to be linked to showAttendance?? -->
        <a href = "showAttendance/{{$eventList->event_id}}" class="btn btn-primary">View Attendance</a>
      @endif
    </div>
  </div>
  @endforeach
@stop