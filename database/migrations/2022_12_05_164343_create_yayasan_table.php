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
        Schema::create('yayasan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_yayasan')->nullable();
            $table->string('akte_notaris')->nullable();
            $table->string('kemenkumham')->nullable();
            $table->string('npwp')->nullable();
            $table->string('sk_kota')->nullable();
            $table->string('sk_provinsi')->nullable();
            $table->string('profil_yayasan')->nullable();
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
        Schema::dropIfExists('yayasan');
    }
};
