<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppartementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appartements', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title',255);
            $table->string('description',255);
            $table->integer('size');
            $table->integer('floor');
            $table->string('image',255);
            $table->integer('room');
            $table->float('price');
            $table->string('address',255);
            $table->integer('postcode');
            $table->string('city',50);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appartements');
    }
}
