<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('agent_id')->unsigned();
            $table->foreign('agent_id')->references('id')->on('agents');
            $table->bigInteger('station_id')->unsigned();
            $table->foreign('station_id')->references('id')->on('stations');
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            $table->text('quality');
            $table->integer('sacks');
            $table->double('gross_weight')->nullable();
            $table->double('net_weight')->nullable();
            $table->integer('moisture')->nullable();
            $table->double('ntc')->nullable();
            $table->double('others')->nullable();
            $table->double('discount')->nullable();
            $table->double('unit_price');
            $table->double('total_price');
            $table->double('amount');
            $table->string('transaction_no', 10)->default('TRN-000001');
            $table->boolean('is_issue')->default('0');
            $table->boolean('is_voucher')->default('0');
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
        Schema::dropIfExists('transactions');
    }
}
