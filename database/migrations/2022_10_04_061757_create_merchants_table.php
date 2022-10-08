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
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('mid', 50)->nullable();
            $table->string('merchant_name', 200);
            $table->string('merchant_email', 100)->unique();
            $table->foreignId('merchant_category_id');
            $table->foreignId('bussiness_id');
            $table->foreignId('bank_id');
            $table->string('account_name', 200);
            $table->float('mdr');
            $table->string('number_account', 100);
            $table->foreignId('rek_pooling_id');
            $table->string('pic', 100)->nullable();
            $table->string('phone', 20);
            $table->text('address1');
            $table->text('address2');
            $table->string('city', 100);
            $table->string('zip_code', 100);
            $table->tinyInteger('is_active');
            $table->text('note')->nullable();
            $table->string('password', 200);
            $table->timestamps();
            $table->foreign('bank_id')->references('id')->on('banks');
            $table->foreign('merchant_category_id')->references('id')->on('merchants_category');
            $table->foreign('bussiness_id')->references('id')->on('bussinesses');
            $table->foreign('rek_pool_id')->references('id')->on('rek_poolings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchants');
    }
};
