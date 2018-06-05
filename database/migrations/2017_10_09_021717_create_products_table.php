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
            $table->integer('category_id');
            $table->string('initials');
            $table->integer('supplier_id');
            $table->string('checkin');
            $table->string('unit');
            $table->string('description');
            $table->string('priceList');
            $table->string('cost');
            $table->string('stock');
            $table->string('priceSales1');
            $table->string('priceSales2');
            $table->string('priceSales3');
            $table->string('priceSales4');
            $table->string('priceSales5');
            $table->integer('coin_id');
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
