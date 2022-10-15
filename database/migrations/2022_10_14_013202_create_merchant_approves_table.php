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
        Schema::create('merchant_approves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merchant_id');
            $table->string('identity_card_photo', 100)->nullable();
            $table->string('npwp_photo', 100)->nullable();
            $table->string('owner_outlet_photo')->nullable();
            $table->string('selfie_ktp_photo')->nullable();
            $table->string('outlet_photo')->nullable();
            $table->string('in_outlet_photo')->nullable();
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
        Schema::dropIfExists('merchant_approves');
    }
};
