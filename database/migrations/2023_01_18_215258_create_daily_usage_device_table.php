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
        Schema::create('daily_usage_devices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('device_id')->nullable();
            $table->string('device_type')->nullable();
            $table->date('date')->nullable();
            $table->float('usage')->default(0);
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
        Schema::dropIfExists('daily_usage_water_meters');
    }
};
