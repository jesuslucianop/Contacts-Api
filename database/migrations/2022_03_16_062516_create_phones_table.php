<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //2022_03_16_062516_create_type_phones_table
     //2022_03_16_062456_create_phones_table
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->unsignedBigInteger('phones_types')->nullable();
            $table->unsignedBigInteger('contactId')->nullable();

            $table->foreign('contactId')
            ->references('id')->on('contacts')
            ->onDelete('set null');


            $table->foreign('phones_types')
            ->references('id')->on('type_phones')
            ->onDelete('set null');
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
        Schema::dropIfExists('phones');
    }
}
