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
        Schema::create('yayasans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_yayasan')->nullable();
            $table->string('akte_notaris')->nullable();
            $table->string('kemenkumham')->nullable();
            $table->string('npwp')->nullable();
            $table->string('sk_kota')->nullable();
            $table->string('sk_provinsi')->nullable();
            $table->longText('profil_yayasan')->nullable();
            $table->longText('moto')->nullable();
            $table->longText('visi')->nullable();
            $table->longText('misi')->nullable();
            $table->longText('alamat')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('email')->nullable();
            $table->string('instagram')->nullable();
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
        Schema::dropIfExists('yayasans');
    }
};
