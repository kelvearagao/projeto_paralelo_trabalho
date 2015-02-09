<a href="{{ URL::action('AttendanceController@selecionarPadrao', array($pedido->id)) }}">
	Selecionar Padrão
</a>
<br>
<br>

<b>Pedido</b><br>
Código: {{ $pedido->code }}<br>
Preço todal: {{ $pedido->total_price }}

<hr>

<b>Dias do pedido</b><br>
@foreach( $pedido->dias_do_pedido as $dia_do_pedido )
	<i>Dia {{ $dia_do_pedido->day }} ({{ $dia_do_pedido->date }})</i><br>
	
	@if(!empty($dia_do_pedido->hotel->price))
		Preço do hotel:{{ $dia_do_pedido->hotel->price }}<br>
		
		Quarto<br>
		@foreach($dia_do_pedido->hotel->rooms as $room )
			 Tipo: {{ $room->type }} Categoria: {{ $room->category_name }} Quantidade: {{ $room->amount }}<br>
		@endforeach

		Acomodação

			<table border="1">
				<thead>
					<th>Quarto</th>
					<th>Cliente</th>
				</thead>
				<tbody>
					@foreach($dia_do_pedido->hotel->rooms as $room )
						@for($i = 1; $i <= $room->amount; $i++ )
							<tr>
								<td>{{ $room->type }} - {{ $room->category_name }}</td>
								<td>
									@if( !empty($room->clients))
										@foreach( $room->clients as $client )
											@if( $client->number == $i )
												{{ $client->name }}<br>
											@endif
										@endforeach
									@else
										sem
									@endif
								</td>
					 		</tr>
					 	@endfor
					@endforeach
				</tbody>
			</table>

			<a href="{{ URL::action('AttendanceController@editarAcomodacao', array($dia_do_pedido->hotel->id, $pedido->id)) }}">
				Editar acomodação
			</a>
	@endif
	
	<hr>
	
@endforeach