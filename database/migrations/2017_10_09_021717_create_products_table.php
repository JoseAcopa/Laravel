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
            $table->integer('category_id');
            $table->string('initials');
            $table->integer('supplier_id');
            $table->string('checkin');
            $table->string('quantity');
            $table->integer('unit_id');
            $table->string('priceList');
            $table->string('cost');
            $table->string('description');
            $table->string('priceSales1');
            $table->string('priceSales2');
            $table->string('priceSales3');
            $table->string('priceSales4');
            $table->string('priceSales5');
            $table->integer('coin_id');
            $table->string('stock');
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
