<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('cpf', 20);
            $table->string('profession', 50)->nullable();
            $table->string('marital_status', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('phone', 20);
            $table->string('address', 50);
            $table->string('neighborhood', 50);
            $table->string('complement', 50)->nullable();
            $table->string('address_number', 50);
            $table->string('city', 50);
            $table->string('state', 50);
            $table->string('country', 50);
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
        Schema::dropIfExists('clients');
    }
}