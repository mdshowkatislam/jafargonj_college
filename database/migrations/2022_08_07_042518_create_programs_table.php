<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('program_category_id')->nullable();
            $table->foreign('program_category_id')->references('id')->on('program_categories')->onDelete('cascade');
            $table->string('ucam_program_id')->nullable();
            $table->unsignedBigInteger('faculty_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('program_title')->nullable();
            $table->string('short_title')->after('program_title')->nullable();
            $table->string('slider_id')->nullable();
            $table->string('image')->nullable();
            $table->integer('status')->default(1);
            $table->longText('objective')->nullable();
            $table->longText('mission')->nullable();
            $table->longText('vision')->nullable();
            $table->longText('outline')->nullable();
            $table->longText('admission_criteria')->nullable();
            $table->longText('general_guidline')->nullable();
            $table->longText('course_list')->nullable();
            $table->string('duration')->after('ucam_program_id')->nullable();
            $table->string('total_credit')->after('duration')->nullable();
            $table->date('admission_start_date')->after('total_credit')->nullable();
            $table->date('admission_end_date')->after('admission_start_date')->nullable();
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
        Schema::dropIfExists('programs');
    }
}
