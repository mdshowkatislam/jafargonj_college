<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumniModeratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumni_moderators', function (Blueprint $table) {
            $table->id();
            $table->integer('profile_id');
            $table->integer('alumni_id');
            $table->integer('alumni_designation_id')->nullable();
            $table->date('join_date')->nullable();
            $table->date('expire_date')->nullable();
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
        Schema::dropIfExists('alumni_moderators');
    }
}
