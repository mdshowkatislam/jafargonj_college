<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_themes', function (Blueprint $table) {
            $table->id();
            $table->integer('theme_id')->nullable();
            $table->integer('theme_section_id')->nullable();
            $table->string('page_id')->nullable();
            $table->integer('page_tab_id')->nullable();
            $table->string('section_title')->nullable();
            $table->string('number_of_column')->nullable();
            $table->integer('section_order')->nullable();
            $table->string('status')->nullable();
            $table->string('page_visivility')->nullable();
            $table->integer('col_id')->default(1);
            $table->string('col1_name')->nullable();
            $table->integer('col2_id')->default(2);
            $table->string('col2_name')->nullable();
            $table->integer('col3_id')->default(3);
            $table->string('col3_name')->nullable();
            $table->integer('col4_id')->default(4);
            $table->string('col4_name')->nullable();
            $table->integer('col5_id')->default(5);
            $table->string('col5_name')->nullable();
            $table->integer('col6_id')->default(6);
            $table->string('col6_name')->nullable();
            $table->longText('custom_style')->nullable();
            $table->longText('custom_css')->nullable();
            $table->longText('cssPreview')->nullable();
            $table->longText('custom_class')->nullable();
            $table->longText('custom_script')->nullable();
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
        Schema::dropIfExists('cms_themes');
    }
}
