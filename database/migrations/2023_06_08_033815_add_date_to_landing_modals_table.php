<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateToLandingModalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('landing_modals', function (Blueprint $table) {
            $table->string('image')->after('name')->nullable();
            $table->date('start_date')->after('status')->nullable();
            $table->date('end_date')->after('start_date')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('landing_modals', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
        });
    }
}
