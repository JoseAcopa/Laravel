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
            $table->string('nInvoice');
            $table->string('TProduct');
            $table->string('NProduct');
            $table->string('provider');
            $table->string('checkout');
            $table->string('quantity');
            $table->string('merma');
            $table->string('stock');
            $table->string('unit');
            $table->string('priceList');
            $table->string('cost');
            $table->string('priceSales');
            $table->string('description');
            $table->string('totalAmount');
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
