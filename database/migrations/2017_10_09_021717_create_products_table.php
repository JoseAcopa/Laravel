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
            $table->string('nInvoice');
            $table->string('nProducts');
            $table->string('provider');
            $table->string('description');
            $table->string('checkin');
            $table->string('quantity');
            $table->string('stock');
            $table->string('unit');
            $table->string('cost');
            $table->string('price1');
            $table->string('price2');
            $table->string('price3');
            $table->string('price4');
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
