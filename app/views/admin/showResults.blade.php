<html>
	<body>
		<div class="table-responsive">
			<table class="table table-bordered table-striped" id="adminEvents">
				<thead>
					<tr>
						<th>
							NAME (TYPE)
						</th>
						<th>
							DATE AND LOCATION
						</th>
					</tr>
				</thead>
				<tbody>
					<?php var_dump($results);?>
					@foreach($results as $result)
						<tr><td>{{$result->fname}}</td></tr>
					@endforeach    
				</tbody>
			</table>
		</div>
	</body>
</html>