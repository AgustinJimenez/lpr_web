<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAutoDetectadoToAccesosAccesos extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accesos__accesos', function(Blueprint $table)
        {
            $table->boolean('auto_detectado')->default(false);
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
            $table->dropColumn('auto_detectado');
        });
    }

}
