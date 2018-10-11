<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero_cotizacion');
            $table->string('fecha');
            $table->string('licitacion');
            $table->string('rfc_cliente');
            $table->string('telefono_cliente');
            $table->string('correo_cliente');
            $table->string('nombre_empresa');
            $table->string('direccion');
            $table->string('nombre_cotizar');
            $table->string('puesto');
            $table->string('observaciones',10000);
            $table->string('total');
            $table->string('moneda');
            $table->integer('cliente_id');
            $table->integer('user_id');
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
        Schema::dropIfExists('quotations');
    }
}
