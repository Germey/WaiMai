<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('identifier');
            $table->string('open_id');
            $table->string('content');
            $table->string('name');
            $table->string('location');
            $table->string('street_number');
            $table->string('phone');
            $table->text('remark');
            $table->float('lng');
            $table->float('lat');
            $table->float('price');
            $table->integer('number');
            $table->integer('pay_status')->default(1);
            $table->integer('delivery_status')->default(1);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}

}
