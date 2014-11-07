@extends('layouts.master')

@section('title')
@parent
Home
@stop

@section('style')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
@stop
@section('content')
<h1>Hello Capstone!</h1>
<p>This is the homepage for the site.</p>

<input type="text" id="mypicker">

<script>
	$(function() {
		$( "#mypicker" ).datepicker({dateFormat: "dd MM yy"});
	});
</script>
@stop