<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeIdToVcHonorBoardMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vc_honor_board_members', function (Blueprint $table) {
            $table->integer('type_id')->after('id')->comment('1=vc, 2=pro_vc, 3=treasurer');
            $table->integer('status')->after('image')->default(1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vc_honor_board_members', function (Blueprint $table) {
            $table->dropColumn('type_id');
            $table->dropColumn('status');
        });
    }
}
