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
        Schema::table('berita', function (Blueprint $table) {
            // Add missing columns if they don't exist
            if (!Schema::hasColumn('berita', 'konten')) {
                $table->text('konten')->nullable()->after('deskripsi');
            }
            if (!Schema::hasColumn('berita', 'judul')) {
                $table->string('judul')->nullable()->after('konten');
            }
            if (!Schema::hasColumn('berita', 'created_at')) {
                $table->timestamps();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('berita', function (Blueprint $table) {
            $table->dropColumn(['konten', 'judul', 'created_at', 'updated_at']);
        });
    }
};
