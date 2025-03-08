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
        Schema::table('dokumen_calon_siswas', function (Blueprint $table) {
            $table->dropForeign('dokumen_calon_siswas_id_dokumen_foreign');
            $table->dropColumn('id_dokumen');

            $table->unsignedBigInteger('dokumen_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dokumen_calon_siswas', function (Blueprint $table) {
            $table->dropColumn('dokumen_id');
            $table->unsignedBigInteger('id_dokumen');
            // Tambahkan kembali foreign key
            $table->foreign('id_dokumen')
                ->references('id')->on('dokumens')
                ->onDelete('cascade');
        });
    }
};
