<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotorcycleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motorcycle', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('year');
            $table->string('color');
            $table->integer('price');
            $table->string('machine');
            $table->string('suspension_type');
            $table->string('transmission_type');
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
        Schema::dropIfExists('motorcycle');
    }
}
