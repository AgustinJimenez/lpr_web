<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccesosSectoresTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accesos__sectores', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
						$table->string('nombre');
						$table->string('descripcion',2000);
            $table->boolean('activo')->default(true);
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
		Schema::drop('accesos__sectores');
	}
}
