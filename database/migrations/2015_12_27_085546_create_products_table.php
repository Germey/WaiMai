<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->text('detail')->nullable();
            $table->float('price');
            $table->string('unit')->default('斤');
            $table->integer('discount')->default(1);
            $table->integer('remain')->default(0);
            $table->integer('max');
            $table->integer('min')->default(0);
            $table->integer('category_id');
            $table->integer('height')->default(0);
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
		Schema::drop('products');
	}

}
