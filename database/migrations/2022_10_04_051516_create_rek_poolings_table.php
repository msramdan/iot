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
        Schema::create('rek_poolings', function (Blueprint $table) {
            $table->id();
            $table->string('rek_pooling_code', 50);
            $table->foreignId('bank_id');
            $table->string('account_name', 100);
            $table->string('number_account', 100);
            $table->timestamps();
            $table->foreign('bank_id')->references('id')->on('banks');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rek_poolings');
    }
};
