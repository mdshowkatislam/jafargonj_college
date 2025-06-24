<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToPersonnelsToOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personnels_to_offices', function (Blueprint $table) {
            $table->integer('additional_charge')->nullable(); 
            $table->string('additional_designation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personnels_to_offices', function (Blueprint $table) {
            $table->dropColumn(['additional_charge', 'additional_designation']);
        });
    }
}
