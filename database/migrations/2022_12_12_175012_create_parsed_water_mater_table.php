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
        Schema::create('parsed_water_mater', function (Blueprint $table) {
            $table->id();
            $table->foreignId('device_id')->nullable();
            $table->foreignId('rawdata_id')->constrained('rawdata')->cascadeOnDelete();
            $table->string('frame_id',20)->nullable();
            $table->string('uplink_interval',150)->nullable();
            $table->float('batrai_status',11,2)->nullable();
            $table->float('temperatur',11,2)->nullable();
            $table->float('total_flow',11,2)->nullable();
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
        Schema::dropIfExists('parsed_water_mater');
    }
};
