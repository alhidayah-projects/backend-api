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
        Schema::create('donates', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_donasi', ['zakat', 'infak', 'sedekah', 'dll']);
            $table->bigInteger('nominal');
            $table->string('nama', 50);
            $table->string('alamat', 100);
            $table->unsignedBigInteger('rekening_id');
            $table->index('rekening_id');
            $table->foreign('rekening_id')->references('id')->on('rekenings')->onDelete('cascade');
            $table->string('telepon', 15);
            $table->string('email', 50);
            $table->text('keterangan');
            $table->enum('status', ['check', 'reject', 'approve'])->default('check')->nullable();
            $table->string('bukti_pembayaran', 100);
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
        Schema::dropIfExists('donates');
    }
};
