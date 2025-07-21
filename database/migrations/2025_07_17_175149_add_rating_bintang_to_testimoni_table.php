<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Berita
        if (!Schema::hasTable('berita')) {
            Schema::create('berita', function (Blueprint $table) {
                $table->id('id_berita');
                $table->string('judul_berita', 255);
                $table->text('deskripsi');
                $table->string('foto', 255)->nullable();
                // Jika ingin relasi ke user, bisa tambahkan kolom id_pengguna dan foreign key
                // $table->integer('id_pengguna')->nullable();
                // $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna')->onDelete('set null');
            });
        }
        // Testimoni
        if (!Schema::hasTable('testimoni')) {
            Schema::create('testimoni', function (Blueprint $table) {
                $table->id('id_testimoni');
                $table->unsignedBigInteger('id_pengguna');
                $table->unsignedBigInteger('id_service');
                $table->text('isi_testimoni');
                $table->string('menyoroti', 5)->default('false');
                $table->integer('rating_bintang');
                $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna')->onDelete('cascade');
                $table->foreign('id_service')->references('id_service')->on('service')->onDelete('cascade');
                // Constraint CHECK akan ditambah setelah create
            });
            // SQLite doesn't support CHECK constraints, so we'll handle validation in the model
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('testimoni', function (Blueprint $table) {
            $table->dropColumn('rating_bintang');
        });
    }
};