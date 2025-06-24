<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSortOrderToAffiliations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affiliations', function (Blueprint $table) {
            $table->integer('sort_order')->after('is_featured')->nullable();
            $table->tinyInteger('status')->after('is_featured')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('affiliations', function (Blueprint $table) {
            $table->dropColumn('sort_order');
            $table->dropColumn('status');
        });
    }
}
