<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nInvoice');
            $table->string('TProduct');
            $table->string('NProduct');
            $table->string('provider');
            $table->string('checkin');
            $table->string('quantity');
            $table->string('stock');
            $table->string('unit');
            $table->string('priceList');
            $table->string('cost');
            $table->string('description');
            $table->string('priceSales1');
            $table->string('priceSales2');
            $table->string('priceSales3');
            $table->string('priceSales4');
            $table->string('priceSales5');
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
        Schema::dropIfExists('checkins');
    }
}
