<?php

class InitialOrdersSeeder extends Seeder {

	public function run()
	{
		DB::table('orders')->delete();
		
		// TESTE01 seed
		 $order = new Order();
		 $order->id = '1';
		 $order->code     = 'TESTE01';
		 $order->arrival_date = '2014-10-15';
		 $order->paxes    = '2';
		 $order->adults   = '2';
		 $order->childs   = '0';
		 $order->total_price = '2289.72';
		 $order->package_ids = '16';
		 $order->currency = 'USD';
		 $order->confirmation_date = '';
		 $order->requesters_public_key = '9dAQnFHCrWS4OJuz';
		 $order->status   = FALSE;
		 $order->save();

			// Clients
			 $client = new Client();
			 $client->id = '1';
			 $client->order_id = '1';
			 $client->first_name = 'Dennis';
			 $client->last_name = 'Braga';
			 $client->treated_as = 'mr';
			 $client->sex = 'male';
			 $client->save();

			 $client = new Client();
			 $client->id = '2';
			 $client->order_id = '1';
			 $client->first_name = 'Mari';
			 $client->last_name = 'Nascimento';
			 $client->treated_as = 'ms';
			 $client->sex = 'female';
			 $client->save();

			// Day 01
			 $day_order = new DaysOrder();
			 $day_order->id = '1';
			 $day_order->order_id = '1';
			 $day_order->day = '1';
			 $day_order->date = '2014-10-15';
			 $day_order->save();

				//Service
				 $service = new OrderService();
				 $service->id = '1';
				 $service->days_order_id = '1';
				 $service->foreign_key_service = '69';
				 $service->service_day = '1';
				 $service->line_up = '1';
				 $service->is_optional = FALSE;
				 $service->price = '46.51';
				 $service->save();

				//Hotel
				 $hotel = new OrderHotel();
				 $hotel->id = '1';
				 $hotel->days_order_id = '1';
				 $hotel->foreign_key_hotel = '130';
				 $hotel->price = '125.06';
				 $hotel->save();

				 $room = new OrderRoom();
				 $room->id     = '1';
				 $room->hotel_id = '1';
				 $room->type   = 'dbl';
				 $room->amount = '1';
				 $room->category_name = 'Standard';
				 $room->save();

			// Day 02
			 $day_order = new DaysOrder();
			 $day_order->id   = '2';
			 $day_order->order_id = '1';
			 $day_order->day  = '2';
			 $day_order->date = '2014-10-16';
			 $day_order->save();

				//Service
				 $service = new OrderService();
				 $service->id = '2';
				 $service->days_order_id = '2';
				 $service->foreign_key_service = '154';
				 $service->service_day = '1';
				 $service->line_up = '1';
				 $service->is_optional = FALSE;
				 $service->price = '52.33';
				 $service->save();

				//Hotel
				 $hotel = new OrderHotel();
				 $hotel->id    = '2';
				 $hotel->days_order_id = '2';
				 $hotel->foreign_key_hotel = '20';
				 $hotel->price = '98.89';
				 $hotel->save();

				 $room = new OrderRoom();
				 $room->id     = '2';
				 $room->hotel_id = '2';
				 $room->type   = 'dbl';
				 $room->amount = '1';
				 $room->category_name = 'Superior';
				 $room->save();

			// Day 03
			 $day_order = new DaysOrder();
			 $day_order->id = '3';
			 $day_order->order_id = '1';
			 $day_order->day = '3';
			 $day_order->date = '2014-10-17';
			 $day_order->save();

				//Service
				 $service = new OrderService();
				 $service->id = '3';
				 $service->days_order_id = '3';
				 $service->foreign_key_service = '39';
				 $service->service_day = '1';
				 $service->line_up = '1';
				 $service->is_optional = FALSE;
				 $service->price = '0.93';
				 $service->save();

				//Hotel
				 $hotel = new OrderHotel();
				 $hotel->id = '3';
				 $hotel->days_order_id = '3';
				 $hotel->foreign_key_hotel = '20';
				 $hotel->price = '98.89';
				 $hotel->save();

				 $room = new OrderRoom();
				 $room->id     = '3';
				 $room->hotel_id = '3';
				 $room->type   = 'dbl';
				 $room->amount = '1';
				 $room->category_name = 'Superior';
				 $room->save();

			// Day 04
			 $day_order = new DaysOrder();
			 $day_order->id = '4';
			 $day_order->order_id = '1';
			 $day_order->day = '4';
			 $day_order->date = '2014-10-18';
			 $day_order->save();

				//Service
				 $service = new OrderService();
				 $service->id = '4';
				 $service->days_order_id = '4';
				 $service->foreign_key_service = '681';
				 $service->service_day = '1';
				 $service->line_up = '1';
				 $service->is_optional = FALSE;
				 $service->price = '290.00';
				 $service->save();
					
				 $service = new OrderService();
				 $service->id = '5';
				 $service->days_order_id = '4';
				 $service->foreign_key_service = '670';
				 $service->service_day = '1';
				 $service->line_up = '2';
				 $service->is_optional = FALSE;
				 $service->price = '93.02';
				 $service->save();

				//Hotel
				 $hotel = new OrderHotel();
				 $hotel->id = '4';
				 $hotel->days_order_id = '4';
				 $hotel->foreign_key_hotel = '139';
				 $hotel->price = '95.09';
				 $hotel->save();

				 $room = new OrderRoom();
				 $room->id     = '4';
				 $room->hotel_id = '4';
				 $room->type   = 'dbl';
				 $room->amount = '1';
				 $room->category_name = 'Suite';
				 $room->save();

			// Day 05
			 $day_order = new DaysOrder();
			 $day_order->id = '5';
			 $day_order->order_id = '1';
			 $day_order->day = '5';
			 $day_order->date = '2014-10-19';
			 $day_order->save();

				//Service
				 $service = new OrderService();
				 $service->id = '6';
				 $service->days_order_id = '5';
				 $service->foreign_key_service = '672';
				 $service->service_day = '1';
				 $service->line_up = '1';
				 $service->is_optional = FALSE;
				 $service->price = '366.28';
				 $service->save();

				//Hotel
				 $hotel = new OrderHotel();
				 $hotel->id = '5';
				 $hotel->days_order_id = '5';
				 $hotel->foreign_key_hotel = '139';
				 $hotel->price = '95.09';
				 $hotel->save();

				 $room = new OrderRoom();
				 $room->id     = '5';
				 $room->hotel_id = '5';
				 $room->type   = 'dbl';
				 $room->amount = '1';
				 $room->category_name = 'Suite';
				 $room->save();

			// Day 06
			 $day_order = new DaysOrder();
			 $day_order->id = '6';
			 $day_order->order_id = '1';
			 $day_order->day = '6';
			 $day_order->date = '2014-10-20';
			 $day_order->save();

				//Service
				 $service = new OrderService();
				 $service->id = '7';
				 $service->days_order_id = '6';
				 $service->foreign_key_service = '671';
				 $service->service_day = '1';
				 $service->line_up = '1';
				 $service->is_optional = FALSE;
				 $service->price = '93.02';
				 $service->save();

				 $service = new OrderService();
				 $service->id = '8';
				 $service->days_order_id = '6';
				 $service->foreign_key_service = '676';
				 $service->service_day = '1';
				 $service->line_up = '2';
				 $service->is_optional = FALSE;
				 $service->price = '290.70';
				 $service->save();

				 $service = new OrderService();
				 $service->id = '9';
				 $service->days_order_id = '6';
				 $service->foreign_key_service = '461';
				 $service->service_day = '1';
				 $service->line_up = '3';
				 $service->is_optional = FALSE;
				 $service->price = '162.79';
				 $service->save();

				//Hotel
				 $hotel = new OrderHotel();
				 $hotel->id = '6';
				 $hotel->days_order_id = '6';
				 $hotel->foreign_key_hotel = '55';
				 $hotel->price = '90.96';
				 $hotel->save();

				 $room = new OrderRoom();
				 $room->id    = '6';
				 $room->hotel_id = '6';
				 $room->type  = 'dbl';
				 $room->amount = '1';
				 $room->category_name = 'Chale';
				 $room->save();

			// Day 07
			 $day_order = new DaysOrder();
			 $day_order->id = '7';
			 $day_order->order_id = '1';
			 $day_order->day = '7';
			 $day_order->date = '2014-10-21';
			 $day_order->save();

				//Service
				 $service = new OrderService();
				 $service->id = '10';
				 $service->days_order_id = '7';
				 $service->foreign_key_service = '442';
				 $service->service_day = '1';
				 $service->line_up = '1';
				 $service->is_optional = FALSE;
				 $service->price = '58.14';
				 $service->save();

				 $service = new OrderService();
				 $service->id = '11';
				 $service->days_order_id = '7';
				 $service->foreign_key_service = '437';
				 $service->service_day = '1';
				 $service->line_up = '2';
				 $service->is_optional = FALSE;
				 $service->price = '58.14';
				 $service->save();

				//Hotel
				 $hotel = new OrderHotel();
				 $hotel->id = '7';
				 $hotel->days_order_id = '7';
				 $hotel->foreign_key_hotel = '151';
				 $hotel->price = '126.67';
				 $hotel->save();

				 $room = new OrderRoom();
				 $room->id     = '7';
				 $room->hotel_id = '7';
				 $room->type   = 'dbl';
				 $room->amount = '1';
				 $room->category_name = 'Superior';
				 $room->save();

			// Day 08
			 $day_order = new DaysOrder();
			 $day_order->id = '8';
			 $day_order->order_id = '1';
			 $day_order->day = '8';
			 $day_order->date = '2014-10-22';
			 $day_order->save();

				//Service
				 $service = new OrderService();
				 $service->id = '12';
				 $service->days_order_id = '8';
				 $service->foreign_key_service = '445';
				 $service->service_day = '1';
				 $service->line_up = '1';
				 $service->is_optional = FALSE;
				 $service->price = '46.51';
				 $service->save();

		// TESTE02 seed
		 $order = new Order();
		 $order->id = '2';
		 $order->code     = 'TESTE02';
		 $order->arrival_date = '2014-08-12';
		 $order->paxes    = '3';
		 $order->adults   = '2';
		 $order->childs   = '1';
		 $order->total_price = '6245.00';
		 $order->package_ids = '6';
		 $order->currency = 'USD';
		 $order->confirmation_date = '';
		 $order->requesters_public_key = '9dAQnFHCrWS4OJuz';
		 $order->status   = FALSE;
		 $order->save();

			// Clients
			 $client = new Client();
			 $client->id = '3';
			 $client->order_id = '2';
			 $client->first_name = 'Eric';
			 $client->last_name = 'Ravineau';
			 $client->treated_as = 'mr';
			 $client->sex = 'male';
			 $client->save();

			 $client = new Client();
			 $client->id = '4';
			 $client->order_id = '2';
			 $client->first_name = 'Leide';
			 $client->last_name = 'Ravineau';
			 $client->treated_as = 'ms';
			 $client->sex = 'female';
			 $client->save();

			 $client = new Client();
			 $client->id = '5';
			 $client->order_id   = '2';
			 $client->first_name = 'Hugo';
			 $client->last_name  = 'Ravineau';
			 $client->treated_as = 'little';
			 $client->age = '11';
			 $client->sex = 'male';
			 $client->save();

			// Day 01
			 $day_order = new DaysOrder();
			 $day_order->id = '9';
			 $day_order->order_id = '2';
			 $day_order->day = '1';
			 $day_order->date = '2014-08-12';
			 $day_order->save();

				//Service
				 $service = new OrderService();
				 $service->id = '13';
				 $service->days_order_id = '9';
				 $service->foreign_key_service = '365';
				 $service->service_day = '1';
				 $service->line_up = '1';
				 $service->is_optional = FALSE;
				 $service->price = '400.00';
				 $service->save();

				 $service = new OrderService();
				 $service->id = '14';
				 $service->days_order_id = '9';
				 $service->foreign_key_service = '407';
				 $service->service_day = '1';
				 $service->line_up = '2';
				 $service->is_optional = FALSE;
				 $service->price = '73.33';
				 $service->save();

				//Hotel
				 $hotel = new OrderHotel();
				 $hotel->id = '8';
				 $hotel->days_order_id = '9';
				 $hotel->foreign_key_hotel = '47';
				 $hotel->price = '477.78';
				 $hotel->save();

				 $room = new OrderRoom();
				 $room->id     = '8';
				 $room->hotel_id = '8';
				 $room->type   = 'tpl';
				 $room->amount = '1';
				 $room->category_name = 'Apartamento Luxo';
				 $room->save();

			// Day 02
			 $day_order = new DaysOrder();
			 $day_order->id = '10';
			 $day_order->order_id = '2';
			 $day_order->day = '2';
			 $day_order->date = '2014-08-13';
			 $day_order->save();

				//Service
				 $service = new OrderService();
				 $service->id = '15';
				 $service->days_order_id = '10';
				 $service->foreign_key_service = '404';
				 $service->service_day = '1';
				 $service->line_up = '1';
				 $service->is_optional = FALSE;
				 $service->price = '523.33';
				 $service->save();

				//Hotel
				 $hotel = new OrderHotel();
				 $hotel->id = '9';
				 $hotel->days_order_id = '10';
				 $hotel->foreign_key_hotel = '47';
				 $hotel->price = '477.78';
				 $hotel->child_of = '8';
				 $hotel->save();

			// Day 03
			 $day_order = new DaysOrder();
			 $day_order->id = '11';
			 $day_order->order_id = '2';
			 $day_order->day = '3';
			 $day_order->date = '2014-08-14';
			 $day_order->save();

				//Service
				 $service = new OrderService();
				 $service->id = '16';
				 $service->days_order_id = '11';
				 $service->foreign_key_service = '5';
				 $service->service_day = '1';
				 $service->line_up = '1';
				 $service->is_optional = FALSE;
				 $service->price = '4000.00';
				 $service->save();

				//Hotel
				 $hotel = new OrderHotel();
				 $hotel->id = '10';
				 $hotel->days_order_id = '11';
				 $hotel->foreign_key_hotel = '59';
				 $hotel->price = '302.33';
				 $hotel->save();

				 $room = new OrderRoom();
				 $room->id    = '9';
				 $room->hotel_id = '10';
				 $room->type  = 'tpl';
				 $room->amount = '1';
				 $room->category_name = 'Standard';
				 $room->save();

			// Day 04
			 $day_order = new DaysOrder();
			 $day_order->id = '12';
			 $day_order->order_id = '2';
			 $day_order->day = '4';
			 $day_order->date = '2014-08-15';
			 $day_order->save();

				//Service
				 $service = new OrderService();
				 $service->id = '17';
				 $service->days_order_id = '12';
				 $service->foreign_key_service = '5';
				 $service->service_day = '2';
				 $service->line_up = '1';
				 $service->is_optional = FALSE;
				 $service->child_of = '16';
				 $service->save();

				//Hotel
				 $hotel = new OrderHotel();
				 $hotel->id = '11';
				 $hotel->days_order_id = '12';
				 $hotel->foreign_key_hotel = '149';
				 $hotel->price = '134.88';
				 $hotel->save();

				 $room = new OrderRoom();
				 $room->id     = '10';
				 $room->hotel_id = '11';
				 $room->type   = 'tpl';
				 $room->amount = '1';
				 $room->category_name = 'Standard';
				 $room->save();

			// Day 05
			 $day_order = new DaysOrder();
			 $day_order->id = '13';
			 $day_order->order_id = '2';
			 $day_order->day = '5';
			 $day_order->date = '2014-08-16';
			 $day_order->save();

				//Service
				 $service = new OrderService();
				 $service->id = '18';
				 $service->days_order_id = '13';
				 $service->foreign_key_service = '5';
				 $service->service_day = '3';
				 $service->line_up = '1';
				 $service->is_optional = FALSE;
				 $service->child_of = '16';
				 $service->save();

				//Hotel
				 $hotel = new OrderHotel();
				 $hotel->id = '12';
				 $hotel->days_order_id = '13';
				 $hotel->foreign_key_hotel = '162';
				 $hotel->price = '166.67';
				 $hotel->save();

				 $room = new OrderRoom();
				 $room->id     = '11';
				 $room->hotel_id = '12';
				 $room->type   = 'tpl';
				 $room->amount = '1';
				 $room->category_name = 'Superior';
				 $room->save();

			// Day 06
			 $day_order = new DaysOrder();
			 $day_order->id = '14';
			 $day_order->order_id = '2';
			 $day_order->day = '6';
			 $day_order->date = '2014-08-17';
			 $day_order->save();

				//Service
				 $service = new OrderService();
				 $service->id = '19';
				 $service->days_order_id = '14';
				 $service->foreign_key_service = '5';
				 $service->service_day = '4';
				 $service->line_up = '1';
				 $service->is_optional = FALSE;
				 $service->child_of = '16';
				 $service->save();

				//Hotel
				 $hotel = new OrderHotel();
				 $hotel->id = '13';
				 $hotel->days_order_id = '14';
				 $hotel->foreign_key_hotel = '162';
				 $hotel->price = '166.67';
				 $hotel->save();

				 $room = new OrderRoom();
				 $room->id     = '12';
				 $room->hotel_id = '13';
				 $room->type   = 'tpl';
				 $room->amount = '1';
				 $room->category_name = 'Superior';
				 $room->save();

			// Day 07
			 $day_order = new DaysOrder();
			 $day_order->id = '15';
			 $day_order->order_id = '2';
			 $day_order->day = '7';
			 $day_order->date = '2014-08-18';
			 $day_order->save();

				//Service
				 $service = new OrderService();
				 $service->id = '20';
				 $service->days_order_id = '15';
				 $service->foreign_key_service = '5';
				 $service->service_day = '5';
				 $service->line_up = '1';
				 $service->is_optional = FALSE;
				 $service->child_of = '16';
				 $service->save();
	}
}