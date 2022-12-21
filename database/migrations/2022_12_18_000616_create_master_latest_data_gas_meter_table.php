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
        Schema::create('master_latest_data_gas_meter', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rawdata_id')->nullable();
            $table->foreignId('device_id')->constrained('devices')->cascadeOnDelete();
            $table->string('frame_id',20)->nullable();
            $table->string('gas_consumption',20)->nullable();
            $table->string('gas_total_purchase',20)->nullable();
            $table->string('purchase_remain',20)->nullable();
            $table->string('balance_of_battery',20)->nullable();
            $table->json('meter_status_word')->nullable();
            $table->string('valve_status',20)->nullable();
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
        Schema::dropIfExists('master_latest_data_gas_meter');
    }
};
