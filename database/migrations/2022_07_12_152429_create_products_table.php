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
        Schema::create('products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('name')->comment('Nombre del producto');
            $table->string('size')->comment('Tamaño del producto');
            $table->string('comment')->comment('Comentario del producto');
            $table->unsignedBigInteger('brand_id')->unsigned()->comment('ID de la marca del producto');
            $table->integer('qty')->comment('Cantidad en inventario');
            $table->date('boarding_date')->comment('Fecha de embarque');
            $table->timestamps();

            // Relaciones
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
