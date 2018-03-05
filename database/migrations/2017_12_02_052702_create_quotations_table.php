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
            $table->string('folio');
            $table->string('RFC');
            $table->string('name');
            $table->string('date');
            $table->string('job');
            $table->string('nClient');
            $table->string('direction');
            $table->string('mail');
            $table->string('company');
            $table->string('nBidding');
            $table->string('description');
            $table->string('total');
            $table->string('IVA');
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
        Schema::dropIfExists('quotations');
    }
}
