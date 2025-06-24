<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsThemeDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_theme_designs', function (Blueprint $table) {
            $table->id();
            $table->integer('page_id')->nullable();
            $table->longText('custom_class')->nullable();
            $table->longText('custom_style')->nullable();
            $table->longText('custom_css')->nullable();
            $table->longText('css_preview_top')->nullable();
            $table->longText('css_preview_footer')->nullable();
            $table->longText('css_preview_bottom')->nullable();
            $table->longText('custom_css_hover')->nullable();
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
        Schema::dropIfExists('cms_theme_designs');
    }
}
