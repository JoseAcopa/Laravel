<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fecha_entrada');
            $table->string('precio_lista');
            $table->string('costo');
            $table->string('stock');
            $table->string('precio_venta1');
            $table->string('precio_venta2');
            $table->string('precio_venta3');
            $table->string('precio_venta4');
            $table->string('precio_venta5')->default(0);
            $table->string('moneda');
            $table->integer('catalogo_id');
            $table->integer('proveedor_id');
            $table->integer('categoria_id');
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
        Schema::dropIfExists('products');
    }
}
