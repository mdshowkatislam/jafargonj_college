<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('faculty_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('slider_id')->nullable();
            $table->string('banner_id')->nullable();
            $table->longText('description')->nullable();
            $table->longText('mission')->nullable();
            $table->longText('vision')->nullable();
            $table->text('motto')->nullable();
            $table->dateTime('establish_date');
            $table->string('url')->nullable();
            $table->string('banner')->nullable()->default('ban.jpg');
            $table->integer('status')->default(1);
            $table->integer('top_menu')->nullable();
            $table->integer('nav_menu')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('email')->nullable();
            $table->string('twitter')->nullable();
            $table->string('member_list')->nullable()->default('lift.pdf');
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
        Schema::dropIfExists('alumnis');
    }
}
