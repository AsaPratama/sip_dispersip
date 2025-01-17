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

            // edit nama field 
            $table->unsignedSmallInteger('jumlah_eksemplar');
            //---

            $table->char('jenis_koleksi');
            
            // field baru
            $table->string('tempat_terbit');
            $table->integer('dimensi_p');
            $table->integer('dimensi_l');
            $table->integer('dimensi_t');
            $table->string('keterangan');
            //---

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
