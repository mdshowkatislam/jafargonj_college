<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFormTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_form_templates', function (Blueprint $table) {
            $table->id();                           // id column
            $table->unsignedBigInteger('form_id');  // form_id column (foreign key)
            $table->json('form_data');              // form_data column
            $table->timestamps();                   // created_at and updated_at columns
            $table->softDeletes();                  // deleted_at column for soft deletes

            // Add foreign key constraint
            $table->foreign('form_id')->references('id')->on('form_templates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_form_templates');
    }
}
