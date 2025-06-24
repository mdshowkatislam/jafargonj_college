<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApaReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apa_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('apa_category_id');
            $table->string('title');
            $table->string('url');
            $table->integer('status')->default(1);
            $table->string('publish_date');
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
        Schema::dropIfExists('apa_reports');
    }
}
