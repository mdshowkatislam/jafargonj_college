<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPageTabIdToCmsThemeDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cms_theme_designs', function (Blueprint $table) {
            $table->unsignedBigInteger('page_tab_id')->after('page_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms_theme_designs', function (Blueprint $table) {
            $table->dropColumn('page_tab_id');
        });
    }
}
