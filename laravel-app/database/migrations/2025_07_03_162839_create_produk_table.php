<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->bigIncrements('id_produk');
            $table->string('nama_produk');
            $table->string('kategori');
            $table->integer('harga');
            $table->integer('stok');
            $table->string('gambar_produk')->nullable();
            $table->text('deskripsi');
        });
    }

    public function down()
    {
        Schema::dropIfExists('produk');
    }
}; 