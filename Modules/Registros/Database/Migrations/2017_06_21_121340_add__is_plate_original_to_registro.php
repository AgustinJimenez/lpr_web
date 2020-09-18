<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsPlateOriginalToRegistro extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registros__registros', function(Blueprint $table)
        {
          $table->enum('is_plate_original',['SI','NO','PROBABLE']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registros__registros', function(Blueprint $table)
        {
          $table->dropColumn('is_plate_original');
        });
    }

}
