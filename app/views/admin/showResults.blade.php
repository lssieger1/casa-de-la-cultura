<html>
	<body>
		<div class="table-responsive">
			<table class="table table-bordered table-striped" id="adminEvents">
				<thead>
					<tr>
						<?php					
						for($r = 0; $r< count($a); $r++){
							print "<th>";
							if($a[$r] === "native_lang"){
								print "language";
							}else{
							print $a[$r];
						}
							print "</th>";
						}			
					?>
					</tr>
				</thead>
				<tbody>
					<?php 
					//for test purpose
					var_dump($results);
					?>

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
	</body>
</html>
<!-- 
register delete event type
view attendance
run query

-->