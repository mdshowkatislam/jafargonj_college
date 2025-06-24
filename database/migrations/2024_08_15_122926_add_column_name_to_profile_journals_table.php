<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnNameToProfileJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profile_journals', function (Blueprint $table) {
            $table->longText('JournalTitle')->nullable(); // Add journalTitle column
            $table->string('DOI')->nullable(); // Add DOI column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profile_journals', function (Blueprint $table) {
            //
        });
    }
}
