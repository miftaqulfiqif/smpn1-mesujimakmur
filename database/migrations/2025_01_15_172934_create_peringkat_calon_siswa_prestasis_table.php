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
        Schema::create('peringkat_calon_siswa_prestasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_data_calon_siswa')->constrained('data_calon_siswas')->onDelete('cascade');
            $table->foreignId('id_nilai')->constrained('nilai_rapots')->onDelete('cascade');
            $table->foreignId('id_periode')->constrained('periode_daftars')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peringkat_calon_siswa_prestasis');
    }
};
