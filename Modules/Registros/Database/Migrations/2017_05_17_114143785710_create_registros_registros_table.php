<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrosRegistrosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('registros__registros', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
						$table->integer('acceso_id')->unsigned();
						$table->foreign('acceso_id')->references('id')->on('accesos__accesos');
						$table->string('plate');
						$table->double('confidence', 12, 8);
						$table->string('region');
						$table->double('processing_time_ms', 15, 8);
						$table->boolean('matches_template');
						$table->boolean('plate_found');
						$table->json('coordinates');
						$table->json('results');
						$table->dateTime('date_time');
						$table->string('plates_found_dir',2000);
						$table->string('plates_not_found_dir',2000);
						$table->string('image_file',500);
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
		Schema::drop('registros__registros');
	}
}
