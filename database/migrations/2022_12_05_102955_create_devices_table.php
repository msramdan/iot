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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('devEUI', 255)->nullable();
            $table->string('devName', 255)->nullable();
            $table->string('devAddr', 255)->nullable();
            $table->string('devType', 255)->nullable();
            $table->string('region')->nullable();
            $table->foreignId('subnet_id')->nullable();
            $table->string('authType')->nullable();
            $table->string('fCnt')->nullable();
            $table->string('fPort')->nullable();
            $table->string('lastSeen')->nullable();
            $table->string('appID')->nullable();
            $table->string('appEUI')->nullable();
            $table->string('appKey')->nullable();
            $table->string('appSKey')->nullable();
            $table->string('nwkSKey')->nullable();
            $table->string('supportClassB')->nullable();
            $table->string('supportClassC')->nullable();
            $table->string('macVersion')->nullable();
            $table->timestamps();
            $table->foreign('subnet_id')->references('id')->on('subnets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
};
