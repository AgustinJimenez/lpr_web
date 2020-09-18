<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPlateOriginalToRegistro extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registros__registros', function(Blueprint $table)
        {
          $table->string('plate_original');
          $table->enum('is_plate',['SI','NO','PROBABLE']);
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
          $table->dropColumn('plate_original');
          $table->dropColumn('is_plate');
        });
    }

}
