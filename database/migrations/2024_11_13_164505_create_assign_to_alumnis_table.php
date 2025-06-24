<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignToAlumnisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_to_alumnis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumni_member_id');
            $table->unsignedBigInteger('alumni_id');
            $table->unsignedBigInteger('alumni_designation_id');
            $table->date('join_date');
            $table->date('expire_date');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assign_to_alumnis');
    }
}
