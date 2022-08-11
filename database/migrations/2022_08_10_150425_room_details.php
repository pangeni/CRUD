<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_details', function (Blueprint $table) {
        $table->id();
        $table->bigInteger('customer_details_id')->unsigned(); 
        $table->foreign('customer_details_id')->references('id')->on('customer_details');
        $table->bigInteger('room_types_id')->unsigned(); 
        $table->foreign('room_types_id')->references('id')->on('room_types');
        $table->integer('no_of_rooms'); 
        $table->date('check_in'); 
        $table->date('check_out'); 
        $table->integer('no_of_person'); 
        $table->string('remarks');
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
        Schema::dropIfExists('room_details');
    }
};
