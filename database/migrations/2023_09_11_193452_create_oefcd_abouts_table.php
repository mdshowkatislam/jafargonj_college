<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOefcdAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oefcd_abouts', function (Blueprint $table) {
            $table->id();
            $table->longText('mission')->nullable();
            $table->longText('vision')->nullable();
            $table->longText('objective')->nullable();
            $table->longText('functions')->nullable();
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
        Schema::dropIfExists('oefcd_abouts');
    }
}
