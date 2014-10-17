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
  <div class="col-xs-6 col-sm-3">
    <div>
      <label>Event Name</label>
      <p>This is the description of the event</p>
      <label>1 March 2014</label>
    </div>
  </div>
  <div class="col-xs-6 col-sm-3">
    <div>
      <label>Event Name</label>
      <p>This is the description of the event</p>
      <label>1 March 2014</label>
    </div>
  </div>
  <div class="col-xs-6 col-sm-3">
    <div>
      <label>Event Name</label>
      <p>This is the description of the event</p>
      <label>1 March 2014</label>
    </div>
  </div>
  <div class="col-xs-6 col-sm-3">
    <div>
      <label>Event Name</label>
      <p>This is the description of the event</p>
      <label>1 March 2014</label>
    </div>
  </div>
  <div class="col-xs-6 col-sm-3">
    <div>
      <label>Event Name</label>
      <p>This is the description of the event</p>
      <label>1 March 2014</label>
    </div>
  </div>
  <div class="col-xs-6 col-sm-3">
    <div>
      <label>Event Name</label>
      <p>This is the description of the event</p>
      <label>1 March 2014</label>
    </div>
  </div>

  <!-- Add the extra clearfix for only the required viewport -->
  <div class="clearfix visible-xs"></div>

  <div class="col-xs-6 col-sm-3">
    <div>
      <label>Event Name</label>
      <p>This is the description of the event</p>
      <label>1 March 2014</label>
    </div>
  </div>
  <div class="col-xs-6 col-sm-3">
    <div>
      <label>Event Name</label>
      <p>This is the description of the event</p>
      <label>1 March 2014</label>
    </div>
  </div>
</div>
@stop