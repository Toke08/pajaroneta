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
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            //esto es un experimento jeje
            $table->decimal('price',8,2);
            $table->string('img');
            $table->text('description');
            $table->timestamps();

            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('category');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foods');
    }
};
