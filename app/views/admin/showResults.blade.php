@extends('layouts.master')

@section('title')
Generated Report
@stop

@section('content')
<div class="table-responsive">
	<table class="table table-bordered table-striped" id="adminEvents">
		<thead>
			<tr>
				<?php					
				for($r = 0; $r < count($a); $r++){
					print "<th>";
					if($a[$r] === "native_lang"){
						print "Language";
					} else{
						print $a[$r];
					}
					print "</th>";
				}			
				?>
			</tr>
		</thead>
		<tbody>
			@foreach($results as $result)
			<tr>
			<?php					
				for($i = 0; $i< count($a); $i++){
					print "<td>";
					print $result->$a[$i];
					print "</td>";
				}			
			?>
			</tr>
			@endforeach  
		</tbody>
	</table>
</div>