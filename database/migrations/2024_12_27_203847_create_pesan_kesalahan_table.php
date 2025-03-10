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
        Schema::create('pesan_kesalahan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_data_calon_siswa')->constrained('data_calon_siswas')->onDelete('cascade');
            $table->text('pesan');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::dropIfExists('pesan_kesalahan'); // Menghapus tabel pesan_kesalahan
}

};
