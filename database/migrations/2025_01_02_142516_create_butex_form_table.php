<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateButexFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('butex_form', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('form_type')->nullable();
            $table->string('data1')->nullable();
            $table->string('data2')->nullable();
            $table->string('data3')->nullable();
            $table->string('data4')->nullable(); 
            $table->string('data5')->nullable();
            $table->string('data6')->nullable();
            $table->string('data7')->nullable();
            $table->string('data8')->nullable(); 
            $table->string('data9')->nullable();
            $table->string('data10')->nullable();
            $table->string('data11')->nullable();
            $table->string('data12')->nullable(); 
            $table->string('data13')->nullable();
            $table->string('data14')->nullable(); 
            $table->string('data15')->nullable(); 
            $table->string('data16')->nullable(); 
            $table->string('data17')->nullable(); 
            $table->string('data18')->nullable(); 
            $table->string('data19')->nullable(); 
            $table->string('data20')->nullable();
            $table->string('data21')->nullable();
            $table->string('data22')->nullable();
            $table->string('data23')->nullable();
            $table->string('data24')->nullable();
            $table->string('data25')->nullable();
            $table->string('data26')->nullable();
            $table->string('data27')->nullable();
            $table->string('data28')->nullable();
            $table->string('data29')->nullable();
            $table->string('data30')->nullable();
            $table->string('data31')->nullable();
            $table->string('data32')->nullable();
            $table->string('data33')->nullable();
            $table->string('data34')->nullable();
            $table->string('data35')->nullable();
            $table->string('data36')->nullable();
            $table->string('data37')->nullable();
            $table->string('data38')->nullable();
            $table->string('data39')->nullable();
            $table->string('data40')->nullable();
            $table->string('data41')->nullable();
            $table->string('data42')->nullable();
            $table->string('data43')->nullable();
            $table->string('data44')->nullable();
            $table->string('data45')->nullable();
            $table->string('data46')->nullable();
            $table->string('data47')->nullable();
            $table->string('data48')->nullable();
            $table->string('data49')->nullable();
            $table->string('data50')->nullable();
            $table->string('data51')->nullable();
            $table->string('data52')->nullable();
            $table->string('data53')->nullable();
            $table->string('data54')->nullable();
            $table->string('data55')->nullable();
            $table->string('data56')->nullable();
            $table->string('data57')->nullable();
            $table->string('data58')->nullable();
            $table->string('data59')->nullable();
            $table->string('data60')->nullable();
            $table->string('data61')->nullable();
            $table->string('data62')->nullable();
            $table->string('data63')->nullable();
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('butex_form');
    }
}
