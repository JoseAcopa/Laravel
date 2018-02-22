<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nInvoice');
            $table->string('category');
            $table->string('initials');
            $table->string('supplier');
            $table->string('checkin');
            $table->string('quantity');
            $table->string('unit');
            $table->string('priceList');
            $table->string('cost');
            $table->string('description');
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
        Schema::dropIfExists('invoices');
    }
}
