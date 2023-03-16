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
        Schema::create('gateway_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gateway_id')->constrained('gateway')->cascadeOnDelete();
            $table->boolean('status_online')->nullable();
            $table->boolean('pktfwd_status')->nullable();
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
        Schema::dropIfExists('gateway_logs');
    }
};
