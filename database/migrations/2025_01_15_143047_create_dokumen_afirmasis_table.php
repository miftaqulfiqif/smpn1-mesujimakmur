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
        Schema::create('dokumen_afirmasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_periode')->constrained('periode_daftars')->onDelete('cascade');
            $table->string('nama');
            $table->boolean('isRequired')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_afirmasis');
    }
};
