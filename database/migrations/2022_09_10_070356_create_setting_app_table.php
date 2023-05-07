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
        Schema::create('setting_app', function (Blueprint $table) {
            $table->id();
            $table->string('app_name');
            $table->string('logo')->nullable();
            $table->string('favicon');
            $table->string('backround_login')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->text('address');
            $table->text('token_callback')->nullable();
            $table->text('endpoint_purchase_code')->nullable();
            $table->text('endpoint_nms')->nullable();
            $table->string('is_notif_tele', 1);
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
        Schema::dropIfExists('setting_web_');
    }
};
