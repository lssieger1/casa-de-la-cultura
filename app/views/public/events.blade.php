@extends('layouts.master')

@section('title')
@parent
Events
@stop

@section('style')
{{ HTML::style('css/grid.css') }}
@stop

@section('content')
<h3>Public Events</h3>
<p>
  This is the template/page where the public can view events. Volunteers will have a very similar view but
  with an additional item at the bottom of each item which will take them to the attendance page.
</p>
<div class="row">
  <!-- Enter populate the values from the database within the div below. -->
  <!-- Use a for loop to make it cleaner. -->
  <ul>

  @foreach  ($eventLists as $eventList)
 
  <div class="col-xs-6 col-sm-3">
    <div>
      <label> {{ $eventList->name}}</label>
      <p> {{ $eventList->description }}</p>
      <label> {{ $eventList->date }}</label>
    </div>
  </div>
    @endforeach
  </ul>
@stop