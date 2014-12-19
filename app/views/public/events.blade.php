@extends('layouts.master')

@section('title')
@parent

@stop

@section('style')
{{ HTML::style('css/grid.css') }}
<style type="text/css">
.whiteColor {
  color: #FFF;
}
</style>
@stop

@section('content')
<div>
   @if(Request::is('pastEvents') || Request::is('pastEventSort?*'))
    {{ Form::model($eventLists, array('url' => '/pastEventSort', 'method' => 'get')) }}
    {{ Form:: label('event_type', 'Sort By: ') }}
    {{ Form:: select('event_id', (array('All') + EventType::all()->lists('type_name','type_id')
       )) }}
    {{ Form::submit('Filter', array('class'=>'btn btn-small btn-primary')) }}
    {{ Form::close() }}
  @elseif(Request::is('pastEventSort'))
    {{ Form::model($eventLists, array('url' => '/pastEventSort', 'method' => 'get')) }}
    {{ Form:: label('event_type', 'Sort By: ') }}
    {{ Form:: select('event_id', (array('All') + EventType::all()->lists('type_name','type_id')
       )) }}
    {{ Form::submit('Filter', array('class'=>'btn btn-small btn-primary')) }}
    {{ Form::close() }}
  @elseif(Request::is('events'))
    {{ Form::model($eventLists, array('url' => '/eventsSort', 'method' => 'get')) }}
    {{ Form:: label('event_type', 'Sort By: ') }}
    {{ Form:: select('event_id', (array('All') + EventType::all()->lists('type_name','type_id')
       )) }}
    {{ Form::submit('Filter', array('class'=>'btn btn-small btn-primary')) }}
    {{ Form::close() }}
  @elseif(Request::is('eventsSort'))
    {{ Form::model($eventLists, array('url' => '/eventsSort', 'method' => 'get')) }}
    {{ Form:: label('event_type', 'Sort By: ') }}
    {{ Form:: select('event_id', (array('All') + EventType::all()->lists('type_name','type_id')
     )) }}
    {{ Form::submit('Filter', array('class'=>'btn btn-small btn-primary')) }}
    {{ Form::close() }}
  @endif
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
        <a href = "showAttendance/{{$eventList->event_id}}" class="btn btn-primary">View Attendance</a>
      @endif
    </div>
  </div>
  @endforeach
@stop