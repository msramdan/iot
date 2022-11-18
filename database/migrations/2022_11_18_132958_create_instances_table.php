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
        Schema::create('instances', function (Blueprint $table) {
            $table->id();
            $table->string('instance_code', 255)->nullable();
            $table->string('instance_name', 255);
            $table->text('address1');
            $table->text('address2');
            $table->integer('provinces_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('village_id')->nullable();
            $table->string('zip_code', 20);
            $table->string('email', 255)->unique();
            $table->string('phone', 15)->unique();
            $table->foreignId('bussiness_id')->nullable();
            $table->string('username', 255)->unique();
            $table->string('password');
            $table->text('longitude');
            $table->text('latitude');
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
        Schema::dropIfExists('instances');
    }
};
