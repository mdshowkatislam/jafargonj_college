<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_sections', function (Blueprint $table) {
            $table->id();
            $table->string('page_id')->nullable();
            $table->string('section_title')->nullable();
            $table->string('number_of_column')->nullable();
            $table->string('section_order')->nullable();
            $table->string('status')->nullable();
            $table->tinyInteger('col_id')->default(1);
            $table->string('col1_name')->nullable();
            $table->tinyInteger('col2_id')->default(2);
            $table->string('col2_name')->nullable();
            $table->tinyInteger('col3_id')->default(3);
            $table->string('col3_name')->nullable();
            $table->tinyInteger('col4_id')->default(4);
            $table->string('col4_name')->nullable();
            $table->tinyInteger('col5_id')->default(5);
            $table->string('col5_name')->nullable();
            $table->tinyInteger('col6_id')->default(6);
            $table->string('col6_name')->nullable();
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
        Schema::dropIfExists('cms_section');
    }
}
