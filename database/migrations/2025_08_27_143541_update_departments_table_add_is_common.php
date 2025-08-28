<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
     
        DB::statement('ALTER TABLE departments MODIFY faculty_id BIGINT UNSIGNED NULL');

        
        Schema::table('departments', function (Blueprint $table) {
            $table->boolean('is_common')->default(false)->after('faculty_id');
        });
    }

    public function down(): void
    {
       
        DB::statement('ALTER TABLE departments MODIFY faculty_id BIGINT UNSIGNED NOT NULL');

       
        Schema::table('departments', function (Blueprint $table) {
            $table->dropColumn('is_common');
        });
    }
};
