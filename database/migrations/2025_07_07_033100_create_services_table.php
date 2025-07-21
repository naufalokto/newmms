<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('service', function (Blueprint $table) {
            $table->id('id_service');
            $table->integer('id_pengguna');
            $table->unsignedBigInteger('id_tipe_service');
            $table->date('tanggal');
            $table->unsignedBigInteger('id_cabang');
            $table->text('keluhan')->nullable();
            $table->time('jadwal');
            $table->timestamp('started_at')->nullable();
            $table->timestamp('finished_at')->nullable();
            $table->enum('status', ['pend', 'pros', 'fin', 'cancel'])->default('pend');

            $table->foreign('id_cabang')->references('id_cabang')->on('cabang')->onDelete('cascade');
            $table->foreign('id_tipe_service')->references('id_tipe_service')->on('type_service')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service');
    }
};
