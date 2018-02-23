<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   Schema::defaultStringLength(191);
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('user')->unique();
            $table->string('email')->unique();
            $table->integer('phone');
            $table->string('password');
            $table->string('tipo');
            $table->boolean('cliente')->default(false);
            $table->boolean('proveedores')->default(false);
            $table->boolean('empleados')->default(false);
            $table->boolean('inventario')->default(false);
            $table->boolean('cotizacion')->default(false);
            $table->boolean('create')->default(false);
            $table->boolean('read')->default(false);
            $table->boolean('update')->default(false);
            $table->boolean('delete')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
