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
        Schema::create('master_latest_datas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rawdata_id')->nullable();
            $table->foreignId('device_id')->constrained('devices')->cascadeOnDelete();
            $table->string('frame_id')->nullable();
            $table->string('uplink_interval')->nullable();
            $table->string('batrai_status',20)->nullable();
            $table->float('temperatur',11,2)->nullable();
            $table->float('total_flow',11,2)->nullable();
            $table->string('status_valve',50)->nullable();
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
        Schema::dropIfExists('master_latest_data');
    }
};
