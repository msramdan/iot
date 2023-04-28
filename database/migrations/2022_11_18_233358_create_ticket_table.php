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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->text('description');
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->integer('author_id')->nullable();
            $table->integer('is_device');
            $table->foreignId('device_id')->nullable()->constrained('devices')->restrictOnUpdate()->cascadeOnDelete();
            $table->enum('status', [
                'open', 'acknowledge', 'closed', 'cancelled', 'need confirmation', 'alert'
            ]);
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
        Schema::dropIfExists('ticket');
    }
};
