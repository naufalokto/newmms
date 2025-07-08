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
            $table->integer('id_service')->primary()->autoIncrement();
            $table->integer('id_pengguna');
            $table->integer('id_tipe_service');
            $table->date('tanggal');
            $table->integer('id_cabang');
            $table->text('keluhan')->nullable();
            $table->time('jadwal');
            $table->string('status', 10);

            $table->foreign('id_cabang')->references('id_cabang')->on('cabang')->onDelete('cascade');
            $table->foreign('id_tipe_service')->references('id_tipe_service')->on('type_service')->onDelete('cascade');
        });
    
        DB::statement("ALTER TABLE service ADD CONSTRAINT service_status_check CHECK (status IN ('pend', 'pros', 'fin', 'cancel'))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service');
    }
};
