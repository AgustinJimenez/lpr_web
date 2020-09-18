<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccesosAccesosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accesos__accesos', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
						$table->string('nombre');
						$table->enum('entrada_salida',['Entrada','Salida']);
						$table->enum('externa_interna',['Externa','Interna']);
						$table->integer('sector_id')->unsigned();
						$table->foreign('sector_id')->references('id')->on('accesos__sectores');
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
		Schema::drop('accesos__accesos');
	}
}
