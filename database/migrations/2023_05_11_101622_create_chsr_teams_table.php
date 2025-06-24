<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChsrTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chsr_teams', function (Blueprint $table) {
            $table->id();
            $table->integer('team_member')->nullable();
            $table->integer('status')->nullable();
            $table->integer('designation')->nullable();
            $table->integer('post')->nullable();
            $table->longText('about')->nullable();
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
        Schema::dropIfExists('chsr_teams');
    }
}
