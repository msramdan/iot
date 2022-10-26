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
        Schema::create('merchant_approves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merchant_id');
            $table->string('identity_card_photo', 100)->nullable(); //KTP
            $table->string('npwp_photo', 100)->nullable(); //NPWP
            $table->string('siup_photo', 100)->nullable(); //SIUP
            $table->string('tdp_photo', 100)->nullable(); //TDP
            $table->string('copy_corporation_deed', 100)->nullable(); //AKTA PENDIRIAN USAHA
            $table->string('copy_management_deed', 100)->nullable(); //AKTA PENGURUS PERUSAHAAN
            $table->string('copy_sk_menkeh', 100)->nullable(); //SK MENKEH
            $table->string('certificate_of_domicile', 100)->nullable(); // SURAT KETERANGAN DOMISILI
            $table->string('copy_bank_account_book', 100)->nullable(); // BUKU REKENING
            $table->string('copy_proof_ownership', 100)->nullable(); //BUKTI KEPEMILIKAN
            $table->string('owner_outlet_photo', 100)->nullable(); // FOTO OWNER + OUTLET
            $table->string('selfie_ktp_photo', 100)->nullable(); // FOTO SELFIE DENGAN KTP
            $table->string('outlet_photo', 100)->nullable(); // FOTO OUTLET
            $table->string('in_outlet_photo', 100)->nullable(); // FOTO DI DALAM OUTLET
            $table->foreign('merchant_id', 100)->references('id')->on('merchants');
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
        Schema::dropIfExists('merchant_approves');
    }
};
