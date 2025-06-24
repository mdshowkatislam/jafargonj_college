<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsButexThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_butex_themes', function (Blueprint $table) {
            $table->id();
            $table->string('theme_name')->nullable();
            $table->string('theme_image')->nullable();
            $table->integer('status')->nullable();
            $table->string('page_id')->nullable();
            $table->string('page_tab_id')->nullable();
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
        Schema::dropIfExists('cms_butex_themes');
    }
}
