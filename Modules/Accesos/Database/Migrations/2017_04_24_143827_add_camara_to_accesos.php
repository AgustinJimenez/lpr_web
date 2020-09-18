<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCamaraToAccesos extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accesos__accesos', function(Blueprint $table)
        {
          $table->integer('camara_lpr_id')->unsigned()->nullable();
          $table->foreign('camara_lpr_id')->references('id')->on('camaras__camaras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accesos__accesos', function(Blueprint $table)
        {
          $table->dropForeign('accesos__accesos_camara_lpr_id_foreign');
          $table->dropColumn('camara_lpr_id');

        });
    }

}
