<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('gateway', function (Blueprint $table) {
            $table->id();
            $table->string('gwid', 100)->nullable();
            $table->boolean('status_online')->nullable();
            $table->boolean('pktfwdStatus')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gateway');
    }
};
