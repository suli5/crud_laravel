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
        Schema::create('libros', function (Blueprint $table) {

            
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            //ESTE SERA EL CAMPO QUE HARA DE RELACION ENTRE LA TABLA libros y la tabla categorias
            $table->bigInteger('categoria_id')->unsigned();
            $table->string('nombre');
            
            $table->timestamps();

            //AHORA HACEMOS LA RELACION, CON foreign CREAMOS UNA CLAVE FORANEA QUE SERA categoria_id QUE ESTARA CONECTADA CON id DE LA TABLA categorias
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('libros');

    }
};
