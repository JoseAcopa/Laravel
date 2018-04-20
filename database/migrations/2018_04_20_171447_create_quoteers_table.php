<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuoteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quoteers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cotizacion_id');
            $table->string('producto');
            $table->string('cantidad');
            $table->string('descripcion');
            $table->string('precio');
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
        Schema::dropIfExists('quoteers');
    }
}
