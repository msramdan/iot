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
        Schema::create('setting_tolerance_alerts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instance_id');
            $table->string('type_device');
            $table->string('field_data');
            $table->float('min_tolerance');
            $table->float('max_tolerance');
            $table->timestamps();
            $table->foreign('instance_id')->references('id')->on('instances')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting_tolerance_alerts');
    }
};
