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
            $table->string('TProducts');
            $table->string('letters');
            $table->string('provider');
            $table->string('description');
            $table->string('unit');
            $table->string('checkout');
            $table->string('cost');
            $table->string('price');
            $table->string('quantityCO');
            $table->string('merma');
            $table->string('stock');
            $table->string('totalAmount');
            $table->string('totalMult');
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
