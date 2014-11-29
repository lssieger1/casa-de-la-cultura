<html>
<body>
	<div>
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
			@foreach($results as $result)
		     <tr><td>{{$result->type_name}}</td></tr>
		    <tr> <td>{{$result->type_id}}</td></tr>
		     @endforeach
		     
		</tbody>
	</table>
</div>
</body>
</html>