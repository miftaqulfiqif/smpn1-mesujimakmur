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
        Schema::create('dokumen_calon_siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_data_calon_siswa')->constrained('data_calon_siswas')->onDelete('cascade');
            $table->foreignId('id_dokumen')->constrained('dokumens')->onDelete('cascade');
            $table->string('path_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_calon_siswas');
    }
};
