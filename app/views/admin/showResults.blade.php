@extends('layouts.master')

@section('title')
Generated Report
@stop

@section('style')
{{ HTML::style('css/dataTables.bootstrap.css') }}
{{ HTML::style('css/dataTables.tableTools.css') }}
@stop

@section('content')
<div class="table-responsive">
	<table class="table table-bordered table-striped" id="reportResultsTable">
		<thead>
			<tr>
				<?php					
				for($r = 0; $r < count($showFields); $r++){
					echo "<th>";
					echo $showFields[$r];			
					echo "</th>";
				}			
				?>
			</tr>
		</thead>
		<tbody>
			@foreach($results as $result)
			<tr>
			<?php					
				for($i = 0; $i< count($a); $i++){
					echo "<td>";
					echo $result->$a[$i];
					echo "</td>";
				}			
			?>
			</tr>
			@endforeach  
		</tbody>
	</table>
</div>
@stop
