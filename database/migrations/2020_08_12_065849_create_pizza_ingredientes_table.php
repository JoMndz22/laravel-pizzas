<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzaIngredientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizza_ingredientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pizza_id');
            $table->unsignedBigInteger('ingredientes_id');
            $table->timestamps();
            $table->foreign('pizza_id')->references('id')->on('pizzas');
            $table->foreign('ingredientes_id')->references('id')->on('ingredientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pizza_ingredientes');
    }
}
