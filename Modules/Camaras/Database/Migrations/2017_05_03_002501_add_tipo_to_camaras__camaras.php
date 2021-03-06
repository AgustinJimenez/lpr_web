<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTipoToCamarasCamaras extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('camaras__camaras', function(Blueprint $table)
        {
          $table->enum('tipo',['LPR','Otros'])->default("LPR");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('camaras__camaras', function(Blueprint $table)
        {
          $table->dropColumn('tipo');
        });
    }

}
