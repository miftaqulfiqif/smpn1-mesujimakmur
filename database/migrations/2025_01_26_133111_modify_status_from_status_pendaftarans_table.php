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
        Schema::table('status_pendaftarans', function (Blueprint $table) {
            $table->enum('status', ['pengecekan_berkas', 'proses_seleksi', 'ditolak', 'diterima'])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('status_pendaftarans', function (Blueprint $table) {
            $table->enum('status', ['pending', 'processing', 'failure', 'rejected', 'accepted', 'cancelled'])->change();
        });
    }
};
