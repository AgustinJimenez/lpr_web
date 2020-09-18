<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCamarasCamarasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('camaras__camaras', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre');

						$table->enum('source',['video','camera']);
						$table->string('camera_url',500);
						$table->string('video_path',500);
						$table->boolean('save_as_video');
						$table->boolean('do_tesseract_analysis');
						$table->boolean('do_knn_analysis');
						$table->boolean('show_live_preview');
						$table->boolean('crop');
						$table->json('crop_data');
						$table->boolean('rotate');
						$table->float('rotate_data', 8, 2);
						$table->boolean('perspective');
						$table->json('perspective_data');

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
		Schema::drop('camaras__camaras');
	}
}
