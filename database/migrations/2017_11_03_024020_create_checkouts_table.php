<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
          $table->increments('id');
          $table->string('numero_factura');
          $table->string('fecha_salida');
          $table->string('cantidad_salida');
          $table->string('precio_venta');
          $table->string('moneda');
          $table->integer('producto_id');
          $table->integer('categoria_id');
          $table->integer('proveedor_id');
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
        Schema::dropIfExists('checkouts');
    }
}
