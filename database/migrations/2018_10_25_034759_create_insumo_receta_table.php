<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsumoRecetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insumo_receta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('insumo_id')->unsigned();
            $table->foreign('insumo_id')->references('id')->on('insumos');
            $table->integer('receta_id')->unsigned();
            $table->foreign('receta_id')->references('id')->on('recetas');
            $table->decimal('cantidad',8,2);
            $table->integer('medida_id')->unsigned();
            $table->foreign('medida_id')->references('id')->on('medidas');
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
        Schema::dropIfExists('insumo_receta');
    }
}
