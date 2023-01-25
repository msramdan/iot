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
        Schema::create('operational_times', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instance_id')->nullable();
            $table->enum('day', ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'])->nullable();
            $table->time('open_hour');
            $table->time('closed_hour');
            $table->timestamps();
            $table->foreign('instance_id')->references('id')->on('instances');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operational_times');
    }
};
