<?php

class AttendanceController extends \BaseController {

	public function listaRegistros()
	{
		$order = Order::find(1);
		$pedido = array();
		$pedido['id'] = $order->id;
		$pedido['code'] = $order->code;
		$pedido['total_price'] = $order->total_price;
		$days_order = $order->days_order()->get();

		foreach($days_order as $day_order)
		{
			$dia_do_pedido = array();
			$dia_do_pedido['day'] = $day_order->day;
			$dia_do_pedido['date'] = $day_order->date;
			$hotel = $day_order->hotel()->first();

			if ( ! empty($hotel))
			{
				$array_hotel = array();
				$array_hotel['id'] = $hotel->id;

				if( ! empty($hotel->price) )
					$array_hotel['price'] = $hotel->price;
				else
				{
					$day_order_hotel = $hotel->child_of()->first()->days_order()->first();
					$array_hotel['price'] = 'Tarifado no dia '. 
											$day_order_hotel->day . 
											' (' . $day_order_hotel->date . ')';
				}

				$rooms = $hotel->rooms()->get();

				foreach($rooms as $room)
				{
					$array_room = array();
					$array_room['type'] = $room->type;
					$array_room['amount'] = $room->amount;
					$array_room['category_name'] = $room->category_name;
					$room_clients = $room->clients()->get();

					foreach( $room_clients as $room_client )
					{
						$client = $room_client->client()->first();
						$array_client['name'] = $client->last_name . ', ' . $client->first_name;
						$array_client['number'] = $room_client->number;
						$array_room['clients'][] = (object) $array_client;
					}

					$array_hotel['rooms'][] = (object) $array_room;	
				}

				$dia_do_pedido['hotel'] = (object) $array_hotel;
			}
			else
				$dia_do_pedido['hotel'] = 'Sem hotel';	

			$pedido['dias_do_pedido'][] = (object) $dia_do_pedido;
		}

		return View::make('attendance.lista_registros', array('pedido' => (object) $pedido));
	}

	public function selecionarPadrao($oder_id)
	{
		$order = Order::find(1);
		$first_day_order = $order->days_order()->first();
		$rooms = $first_day_order->hotel()->first()->rooms()->get();

		$array_rooms = array();
		foreach( $rooms as $room )
		{
			$array_room = array();
			$array_room['type'] = $room->type;

			switch ($room->type) 
			{
				case 'sgl':
					$array_room['type_value'] = 1;
					break;
				case 'dbl':
					$array_room['type_value'] = 2;
					break;
				case 'tpl':
					$array_room['type_value'] = 3;
					break;
			}

			$array_room['amount'] = $room->amount;
			$array_room['category_name'] = $room->category_name;

			$array_rooms[] = (object) $array_room;
		}

		$name_clients = $this->getArrayClients($order->clients()->get());

		return View::make('attendance.selecionar_padrao', array('rooms' => $array_rooms,
																'name_clients' => $name_clients,
																'order_id' => $oder_id));
	}

	public function aplicarPadrao()
	{
		$padrao = Input::get('padrao');
		$order_id = Input::get('order_id');
		$order = Order::find($order_id);
		$days_order = $order->days_order()->get();


		foreach( $days_order as $day_order )
		{
			$hotel = $day_order->hotel()->first();

			if( ! empty($hotel) )
			{	
				// Apaga registro do quarto caso exita em ClientsRooms
				$rooms = $hotel->rooms()->get();
				foreach( $rooms as $room )
					ClientsRooms::where('room_id', $room->id)->delete();

				// Aplica o padrao
				echo '<h2>dia ' . $day_order->day . '</h2>';
				
				foreach ($padrao as $type => $categories )
				{
					foreach ( $categories as  $category => $blocks )
					{
						$room =  $hotel->rooms()->where('type', $type)->where('category_name', $category)->first();

						if ( !empty($room) )
						{
							$num_room = $room->amount;

							foreach ($blocks as $num_block => $client_ids)
							{
								echo $room->type . ' - ' . $room->category_name . '<br>';

								foreach ( $client_ids as $number => $client_id )
								{
									$client = Client::find($client_id);
									echo '<i>' . $client->last_name . ', ' . $client->first_name . '</i><br>';

									$client_room = new ClientsRooms;
									$client_room->room_id = $room->id;
									$client_room->client_id = $client->id;
									$client_room->number = $num_block;

									$client_room->save();
								}

								echo 'aplicar<br>';

								$num_room--;

								if ($num_room == 0)
									break;
							}
						}
					}
				}
			}
		}

		echo '<hr>';

		echo '<pre>'; print_r($padrao); exit;
	}
	
	public function editarAcomodacao($hotel_id, $order_id) 
	{
		$hotel = OrderHotel::find($hotel_id);
		$rooms = $hotel->rooms()->get();

		$array_rooms = array();

		foreach( $rooms as $room )
		{
			for( $i = 1; $i <= $room->amount; $i++)
			{
				$array_room = array();
				$array_room['number'] = $i;
				$array_room['id'] = $room->id;
				$array_room['type'] = $room->type;
				$array_room['category'] = $room->category_name;

				switch ($room->type) 
				{
					case 'sgl':
						$array_room['type_value'] = 1;
						break;
					case 'dbl':
						$array_room['type_value'] = 2;
						break;
				}

				echo $room->type . ' - ' . $room->category_name . '<br>';

				$clients_room = $room->clients()->get();
				
				if( !empty($clients_room) )
				{
					foreach ($clients_room as $client_room )
					{
						if( $client_room->number == $i )
						{
							$client = $client_room->client()->first();

							$array_client = array();

							$array_client['id'] = $client->id;
							$array_client['name'] = $client->first_name . ', ' . $client->last_name;

							$array_room['clients'][] = (object) $array_client;
						}
					}
				}

				$array_rooms[] = (object) $array_room;
			}
		}

		//echo '<pre>'; print_r($array_rooms); exit;

		$order = Order::find($order_id);
		$name_clients = $this->getArrayClients($order->clients()->get());

		return View::make('attendance.editar_acomodacao', array('rooms' => $array_rooms,
																'name_clients' => $name_clients));

	}

	public function salvarAcomodacao() 
	{
		$input = Input::get('select');

		foreach( $input as $room_id => $blocks )
		{
			ClientsRooms::where('room_id', $room_id)->delete();

			foreach( $blocks as $block => $client_ids )
			{
				foreach ($client_ids as $client_id )
				{
					$client_room = new ClientsRooms;

					$client_room->room_id = $room_id;
					$client_room->client_id = $client_id;
					$client_room->number = $block;

					$client_room->save();
				}
			}
		}

		echo '<pre>'; print_r($input); exit;
	}

	public function getArrayClients($clients) 
	{
		$name_clients = array('--' => '--');

		foreach( $clients as $client )
		{
			$name_clients[$client->id] = $client->last_name . ', ' . $client->first_name;
		}

		return $name_clients;
	}
}
