<html>
	<head>
	</head>
	<body>
		<a href="{{ URL::action('AttendanceController@listaRegistros') }}">
			Visualizar pedido
		</a>
		<br>

		<b>Selecionar Padrão</b><br>
		<hr>
		{{ Form::open(array('url' => 'attendance/aplicarPadrao', 'method' => 'post')) }}
			<table border="1">
				<thead>
					<th>Quarto</th>
					<th>Cliente</th>
				</thead>
					@foreach( $rooms as $room )
						@for( $i = 1; $i <= $room->amount; $i++ )
							<tr>
								<td>{{ $room->type }} - {{ $room->category_name }}</td>
								<td>
									@for( $j = 1; $j <= $room->type_value; $j++ )
										{{ Form::select("padrao[$room->type][$room->category_name][$i][$j]", $name_clients, null, array('class' => 'select')) }}<br><br>
									@endfor
								</td>
							</tr>
						@endfor
					@endforeach
			</table>
			{{ Form::hidden('order_id', $order_id) }}
			{{ Form::submit('Aplicar', array('class' => 'aplicar')) }}
	{{ Form::close() }}

	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

	<script type="text/javascript">
		$('.aplicar').click(function() {
			alert('Verificar');
			
			var flag = 0;

			$('.select').each(function(){
				var value = $(this).val();

				if( value == '--')
				{
					alert('Erro! Deve selecionar um pessoa diferente pra cada quarto!');
					flag = 1;

					return false;
				}

				var cont = 0;

				$('.select').each(function(){
					if( value == $(this).val())
					{
						cont++;
					}

					if (cont == 2)
					{
						flag = 1;

						return false;
					}
				});

				if (flag == 1)
				{
					alert('Erro! Deve selecionar um pessoa diferente pra cada quarto!');
					return false;
				}

			});

			if (flag == 1)
				return false;
		})
	</script>
</body>
</html>