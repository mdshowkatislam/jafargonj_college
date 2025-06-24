<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddResearchTimeToAtAGlanceNumbers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('at_a_glance_numbers', function (Blueprint $table) {
            $table->string('research_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('at_a_glance_numbers', function (Blueprint $table) {
            $table->dropColumn('research_time');
        });
    }
}
