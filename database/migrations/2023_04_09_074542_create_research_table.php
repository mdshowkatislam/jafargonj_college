<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research', function (Blueprint $table) {
            $table->id();
            $table->integer('research_type');
            $table->integer('research_for');
            $table->integer('ref_id')->nullable();
            $table->string('title');
            $table->integer('director_id')->nullable();
            $table->integer('director_bup')->nullable();
            $table->string('director_name')->nullable();
            $table->integer('supervisor_id')->nullable();
            $table->integer('supervisor_bup')->nullable();
            $table->string('supervisor_name')->nullable();
            $table->string('co_author')->nullable();
            $table->longText('description')->nullable();
            $table->string('journal_name')->nullable();
            $table->string('journal_index')->nullable();
            $table->string('journal_category')->nullable();
            $table->string('url')->nullable();
            $table->string('issn')->nullable();
            $table->string('volume')->nullable();
            $table->string('issue')->nullable();
            $table->string('publish_status')->nullable();
            $table->date('date')->nullable();
            $table->string('year');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('research');
    }
}
