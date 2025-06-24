<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalDesignationToHallMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hall_members', function (Blueprint $table) {
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
        Schema::table('hall_members', function (Blueprint $table) {
            $table->dropColumn('additional_charge');
            $table->dropColumn('additional_designation');
        });
    }
}
