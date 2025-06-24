<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryAndProgramCategoryIdToNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            // Add the 'category' column with a nullable integer type
            $table->unsignedInteger('category')->nullable()->comment('1 = Results, 2 = Administrative, 3 = Academic, 4 = Programs, 5 = Affiliated, 6 = Others');

            // Add the 'program_category_id' column with a nullable integer type
            $table->unsignedInteger('program_category_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            // Remove the 'category' column
            $table->dropColumn('category');

            // Remove the 'program_category_id' column
            $table->dropColumn('program_category_id');
        });
    }
}
