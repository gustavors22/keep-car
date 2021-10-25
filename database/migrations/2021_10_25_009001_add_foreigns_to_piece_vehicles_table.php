<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToPieceVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('piece_vehicles', function (Blueprint $table) {
            $table
                ->foreign('vehicle_id')
                ->references('id')
                ->on('vehicles')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('piecie_id')
                ->references('id')
                ->on('pieces')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('piece_vehicles', function (Blueprint $table) {
            $table->dropForeign(['vehicle_id']);
            $table->dropForeign(['piecie_id']);
        });
    }
}
