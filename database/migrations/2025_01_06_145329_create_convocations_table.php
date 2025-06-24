<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConvocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convocations', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->text('data1')->nullable();
            $table->text('data2')->nullable();
            $table->text('data3')->nullable();
            $table->text('data4')->nullable();
            $table->text('data5')->nullable();
            $table->text('data6')->nullable();
            $table->text('data7')->nullable();
            $table->text('data8')->nullable();
            $table->text('data9')->nullable();
            $table->text('data10')->nullable();
            $table->string('status')->default('1');
            $table->string('registration_status')->default('1');
            $table->text('registration_link')->nullable();
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
        Schema::dropIfExists('convocations');
    }
}
