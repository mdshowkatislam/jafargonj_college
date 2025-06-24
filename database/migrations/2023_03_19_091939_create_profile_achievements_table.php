<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_achievements', function (Blueprint $table) {
            $table->id();
                $table->unsignedBigInteger('profile_id')->nullable();
                $table->string('TotalAchievement')->nullable();
                $table->longText('achievement')->nullable();
                $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
                $table->softDeletes();
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
        Schema::dropIfExists('profile_achievements');
    }
}
