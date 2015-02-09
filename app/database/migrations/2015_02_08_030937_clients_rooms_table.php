<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClientsRoomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients_rooms', function($table)
		{
		    $table->integer('room_id')->unsigned();
		    $table->integer('client_id')->unsigned();
		    $table->integer('number');

		    $table->primary(array('room_id', 'client_id'));
		    $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');;
		    $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');;
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clients_rooms');
	}

}
