<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('van_no', 10);
            $table->integer('bl_no');
            $table->text('ship_from');
            $table->text('ship_to');
            $table->float('price');
            $table->date('ship_date');
            $table->string('shipment_no', 9)->default('SP-000001');
            $table->float('bales')->nullable();
            $table->float('kls')->nullable();
            $table->float('others')->nullable();
            $table->boolean('is_ship')->default('0');
            $table->boolean('status')->default('0');
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
        Schema::dropIfExists('shipment');
    }
}
