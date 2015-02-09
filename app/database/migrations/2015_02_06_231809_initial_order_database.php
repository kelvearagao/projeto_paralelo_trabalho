<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialOrderDatabase extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/**
		 * This creates the orders table. General information about the order itself 
		 *    is put together here.
		 */
		Schema::create('orders', function($table)
		{
			$table->increments('id');
			$table->string('requesters_public_key', 255);
			$table->string('code', 20);
			$table->date('arrival_date');
			$table->integer('paxes');
			$table->integer('adults');
			$table->integer('childs');
			$table->decimal('total_price');
			$table->string('package_ids', 40);
			$table->string('currency', 3);  //Currency's code.
			$table->date('confirmation_date')->nullable();
			$table->boolean('status');
			$table->timestamps();
		});

		/**
		 * This creates the clients table. Information regrards the clients are put here.
		 *    One instance is made for each of them.
		 */
		Schema::create('clients', function($table)
		{
			$table->increments('id');
			$table->integer('order_id')->unsigned();
			$table->string('first_name');
			$table->string('last_name');
			$table->integer('age')->nullable(); // If they have age, they're marked as kids.
			$table->enum('treated_as', array('mr', 'ms', 'mrs', 'little'));
			$table->enum('sex', array('male', 'female'));
			$table->timestamps();

			$table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
		});

		/**
		 * This creates the days order table, being one instace to each day on the package.
		 */
		Schema::create('days_order', function($table)
		{
			$table->increments('id');
			$table->integer('order_id')->unsigned();
			$table->integer('day'); // This should
			$table->date('date');
			$table->timestamps();
			
			$table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
		});

		/**
		 * This creates the services table, one instance to each service (including optionals) on the package
		 */
		Schema::create('services', function($table)
		{
			$table->increments('id');
			$table->integer('days_order_id')->unsigned();
			$table->integer('foreign_key_service')->unsigned();
			$table->integer('service_day');     				// Represents the service day's number
			$table->integer('line_up')->unsigned()->nullable(); // Order in which the services are supposed to be executed.
			$table->boolean('is_optional');						// In this case, the 'line_up' information is held blank.
			$table->decimal('price', 8, 2)->nullable();
			$table->integer('child_of')->nullable()->unsigned();
			$table->timestamps();

			$table->foreign('days_order_id')->references('id')->on('days_order')->onDelete('cascade');
			$table->foreign('child_of')->references('id')->on('services')->onDelete('cascade');
		});

		/**
		 * This creates the hotels table. Should be one at a day.
		 */
		Schema::create('hotels', function($table)
		{
			$table->increments('id');
			$table->integer('days_order_id')->unsigned();
			$table->integer('foreign_key_hotel')->unsigned();
			$table->decimal('price', 8, 2)->nullable();
			$table->integer('child_of')->nullable()->unsigned();  //Should pointing to a day to refers price, in case of 'many days hotels'
			$table->timestamps();

			$table->foreign('days_order_id')->references('id')->on('days_order')->onDelete('cascade');
			$table->foreign('child_of')->references('id')->on('hotels')->onDelete('cascade');
		});

		/**
		 * This creates the rooms table, that indicates how many and which 
		 *    rooms are alocated by hotel at a time.
		 */
		Schema::create('rooms', function($table)
		{
			$table->increments('id');
			$table->integer('hotel_id')->unsigned();
			$table->enum('type', array('sgl', 'dbl', 'dblchd', 'dpl_twn', 'tpl', 'tplchd', 'qdpl', 'qdplchd'));
			$table->integer('amount');			// How many rooms
			$table->decimal('price', 8, 2);		// How many rooms
			$table->string('category_name');	// Category's name, to be searched on 'Hermes' database.
			$table->timestamps();

			$table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
		});

		/**
		 * This creates the email hotel. This tracks the number and type of email automatically
		 *    sent to a hotel.
		 */
		Schema::create('email_hotel', function($table)
		{
			$table->increments('id');
			$table->integer('hotel_id')->unsigned();
			$table->date('date');
			$table->enum('type', array('res', 'can', 'and_ped', 'cfr'));
			$table->timestamps();

			$table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('email_hotel');
		Schema::drop('rooms');
		Schema::drop('hotels');
		Schema::drop('services');
		Schema::drop('days_order');
		Schema::drop('clients');
		Schema::drop('orders');
	}

}
