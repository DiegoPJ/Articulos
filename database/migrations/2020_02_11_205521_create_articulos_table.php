<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{

    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            //id, nombre, categoria (Bazar, Hogar, Elećtronica), precio, stock, imagen
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('categoria');
            $table->float('precio',6,2);
            $table->integer('stock');
            $table->string('foto')->default('/img/articulos/default.jpg');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}
