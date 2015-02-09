





{{ Form::open(array('url' => 'attendance/salvarAcomodacao', 'method' => 'post')) }}
	<table border="1">
		<thead>
			<th>Quarto</th>
			<th>Cliente</th>
		</thead>
		<tbody>
			@foreach( $rooms as $room )
				<tr>
					<td>{{ $room->id }} - {{ $room->type }} - {{ $room->category }}</td>
					<td>
						@for( $i = 1; $i <= $room->type_value; $i++ )
							@if( !empty($room->clients) )
								@foreach ( $room->clients as $key => $client)
									@if( $i == ($key + 1) )
										{{ Form::select("select[$room->id][$room->number][]", $name_clients, $client->id) }}<br><br>
									@endif
								@endforeach
							@else
								{{ Form::select("select[$room->id][$room->number][]", $name_clients) }}<br><br>
							@endif
						@endfor
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ Form::submit('cadastrar')}}
{{ Form::close() }}

<pre>
{{ print_r($rooms) }}