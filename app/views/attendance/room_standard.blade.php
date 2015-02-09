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

	<div class="container">

		<h3>Configurar quarto</h3>

		{{ Form::open(array('url' => 'attendance/apply_room_standard', 'method' => 'post')) }}
			<table class="table table-bordered">
			<thead>
				<th>Quarto</th>
				<th>Cliente</th>
			</thead>

			<tbody>
				@foreach($rooms as $room)
					@for($i = 1; $i <= $room->amount; $i++)
						<tr>
							<td>
								{{ $room->type }} - {{ $room->category_name }}
							</td>
							<td>
								@for($j = 1; $j <= $room->type_value; $j++)
									{{ Form::select("select[$room->id-$room->type-$i-$j]['client_id']", $client_names, '--', array('class' => 'select')) }}
									{{ Form::hidden("select[$room->id-$room->type-$i-$j]['room_id']", $room->id) }}
									{{ Form::hidden("select[$room->id-$room->type-$i-$j]['number']", $j) }}
									<br>
									<br>
								@endfor	
							</td>
						</tr>
					@endfor
				@endforeach
			</tbody>
			</table>

			{{ Form::submit('Aplicar padrão') }}
		{{ Form::close() }}
	</div>

	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


	<script>

		$('.select').click(function(){
			$(this).data('pre', $(this).val());
		});


		$('.select').change(function(){
			var before_change = $(this).data('pre');
			var option_value = $(this).val();


			$('option').each(function() {
				if( $(this).val() == option_value) {
					$(this).css('backgroundColor','yellow');
				}
			});
	
			$('option').each(function() {
				if( $(this).val() == before_change )
				{
					$(this).css('backgroundColor','');
				}
			});

		});



	</script>

</body>
</html>