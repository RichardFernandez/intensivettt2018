<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuplementosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suplementos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_suplemento', 50);
            $table->string('tipo_suplemento', 50);
            $table->string('imagen');
            $table->integer('marca')->unsigned();
            $table->foreign('marca')->references('id')->on('marcasuplementos');
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
        Schema::dropIfExists('suplementos');
    }
}
