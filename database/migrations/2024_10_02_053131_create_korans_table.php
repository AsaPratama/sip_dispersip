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
        Schema::create('korans', function (Blueprint $table) {
            $table->increments('kode_koran');
            $table->string('judul');
            $table->string('penulis');
            $table->string('penerbit');
            $table->year('tahun_terbit');
            $table->unsignedSmallInteger('jumlah_halaman');
            $table->char('kondisi');
            $table->integer('rak_id');
            $table->unsignedSmallInteger('jumlah_buku');
            $table->char('jenis_koleksi');
            $table->string('pdf_path')->nullable();
            $table->string('cover_path')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('korans');
    }
};
