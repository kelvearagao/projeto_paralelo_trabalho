<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</head>

<body>

<div class="col-md-8 col-md-offset-2">
	<h2>Packages</h2>

	<table class="table table-striped table-hover">
		<thead>
			<th>Id</th>
			<th>City Id</th>
			<th>Days</th>
			<th>Code</th>
			<th>Status</th>
			<th>Editar</th>
		</thead>

		<tbody>
		@foreach($packages as $package)
			<tr>
				<td>{{ $package->id }}</td>
				<td>{{ $package->city_id }}</td>
				<td>{{ $package->days }}</td>
				<td>{{ $package->code }}</td>
				<td>{{ $package->status }}</td>
				<td><a href="package/{{$package->id}}/edit">Editar</a></td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>

</body>