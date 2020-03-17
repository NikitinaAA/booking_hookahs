<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHookahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hookah', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('hookah_place_id');
            $table->string('name');
            $table->integer('tube_amount');
            $table->timestamps();

            $table->foreign('hookah_place_id')->references('id')->on('hookah_place')->onDelete('cascade');
            $table->unique(['name', 'tube_amount', 'hookah_place_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hookah');
    }
}
