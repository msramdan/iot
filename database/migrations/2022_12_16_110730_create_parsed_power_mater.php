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
        Schema::create('parsed_power_mater', function (Blueprint $table) {
            $table->id();
            $table->foreignId('device_id')->nullable();
            $table->foreignId('rawdata_id')->constrained('rawdata')->cascadeOnDelete();
            $table->string('frame_id',20)->nullable();
            $table->string('tegangan',20)->nullable();
            $table->string('arus',20)->nullable();
            $table->string('frekuensi_pln',20)->nullable();
            $table->string('active_power',20)->nullable();
            $table->string('power_factor',20)->nullable();
            $table->string('total_energy',20)->nullable();
            $table->string('status_switch',50)->nullable();
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
        Schema::dropIfExists('parsed_power_mater');
    }
};
