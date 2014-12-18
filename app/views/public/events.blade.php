@extends('layouts.master')

@section('title')

@parent
<?php 
  if (date("Y-m-d") <= $eventLists[0]->date) {
    echo "Upcoming";
  }
  else {
    echo "Past";
  }
?>
 Events
@stop

@section('style')
{{ HTML::style('css/grid.css') }}
@stop
@section('content')
<h5> Sort by: </h5>

<!-- {{ Form::open()}}


<div class="row">
  Enter populate the values from the database within the div below.
  <! Use a for loop to make it cleaner. >
  <ul> -->


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
       <br><button type="button" disabled>Attendance</button> 
      @else
        <br><a href = "attendance/{{$eventList->event_id}}" class="btn btn-primary">Attendance</a>
        @endif
         <!-- needs to be linked to showAttendance?? -->
        <a href = "showAttendance/{{$eventList->event_id}}" class="btn btn-primary">View Attendance</a>
      @endif
    </div>
  </div>
    @endforeach
  </ul>
@stop