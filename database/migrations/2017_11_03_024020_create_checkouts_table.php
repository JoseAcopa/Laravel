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
          $table->integer('category_id');
          $table->string('initials');
          $table->integer('supplier_id');
          $table->string('unit');
          $table->string('date_out');
          $table->string('description');
          $table->string('priceList');
          $table->string('cost');
          $table->integer('coin_id');
          $table->string('stock');
          $table->string('quantity_output');
          $table->string('price_output');
          $table->string('keyProduct');
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
