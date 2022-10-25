<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merchant_id');
            $table->string('mti', 100);
            $table->dateTime('date_transaction');
            $table->string('pan', 100);
            $table->string('rrn', 100);
            $table->string('tid', 100);
            $table->string('customer_name', 255);
            $table->string('transaction_type', 255);
            $table->float('mdr_amount')->default(0);
            $table->integer('amount')->default(0);
            $table->float('total_amount')->default(0);
            $table->foreign('merchant_id')->references('id')->on('merchants');
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
};
