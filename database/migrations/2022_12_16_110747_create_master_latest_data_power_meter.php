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
        Schema::create('master_latest_data_power_meter', function (Blueprint $table) {
            $table->id();
            $table->foreignId('device_id')->nullable();
            $table->foreignId('rawdata_id')->constrained('rawdata')->cascadeOnDelete();
            $table->string('frame_id',20)->nullable();
            $table->string('tegangan',20)->nullable();
            $table->string('arus',20)->nullable();
            $table->string('frekuensi_pln',20)->nullable();
            $table->string('active_power',20)->nullable();
            $table->string('power_factor',20)->nullable();
            $table->string('total_engergy',20)->nullable();
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
        Schema::dropIfExists('master_latest_data_power_meter');
    }
};
