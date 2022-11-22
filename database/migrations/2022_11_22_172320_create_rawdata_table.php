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
        Schema::create('rawdata', function (Blueprint $table) {
            $table->id();
            $table->string('devEUI', 100);
            $table->integer('appID');
            $table->string('type', 50);
            $table->string('time', 100);
            $table->string('gwid', 100);
            $table->string('rssi', 20);
            $table->string('snr', 20);
            $table->string('freq', 20);
            $table->string('dr', 10);
            $table->string('adr', 10);
            $table->string('class', 10);
            $table->string('fcnt', 10);
            $table->string('fport', 10);
            $table->string('confirmed', 10);
            $table->string('data', 100);
            $table->text('gws');
            $table->json('payload_data');
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
        Schema::dropIfExists('rawdata');
    }
};
