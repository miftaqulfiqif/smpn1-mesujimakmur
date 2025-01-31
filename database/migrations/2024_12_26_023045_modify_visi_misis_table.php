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
        // Hapus tabel 'visi_misis'
        Schema::dropIfExists('visi_misis');

        // Buat tabel 'visi'
        Schema::create('visi', function (Blueprint $table) {
            $table->id();
            $table->string('editor');
            $table->text('konten');
            $table->timestamps();
        });

        // Buat tabel 'misi'
        Schema::create('misi', function (Blueprint $table) {
            $table->id();
            $table->string('editor');
            $table->text('konten');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus tabel 'visi' dan 'misi'
        Schema::dropIfExists('visi');
        Schema::dropIfExists('misi');

        // Kembalikan tabel 'visi_misis'
        Schema::create('visi_misis', function (Blueprint $table) {
            $table->id();
            $table->string('editor');
            $table->string('konten')->required();
            $table->timestamps();
        });
    }
};
