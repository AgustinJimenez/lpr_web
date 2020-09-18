<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLprTimeToCamarasCamaras extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('camaras__camaras', function(Blueprint $table)
        {
            $table->integer('lpr_time')->default(5000);
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
            $table->dropColumn('lpr_time');
        });
    }

}
