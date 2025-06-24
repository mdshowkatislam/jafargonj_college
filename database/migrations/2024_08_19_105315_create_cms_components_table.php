<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_components', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained('cms_sections')->onDelete('cascade');
            $table->string('column_id')->nullable();
            $table->string('component_id')->nullable();
            $table->string('component_type')->nullable();
            $table->longText('long_descriptions')->nullable();
            $table->string('files')->nullable();
            $table->string('image_class')->nullable();
            $table->longText('image_style')->nullable();
            $table->longText('image_style2')->nullable();
            $table->longText('custom_style')->nullable();
            $table->longText('custom_css')->nullable();
            $table->longText('cssPreview')->nullable();
            $table->longText('custom_class')->nullable();
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
        Schema::dropIfExists('cms_components');
    }
}
