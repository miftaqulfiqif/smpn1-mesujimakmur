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
        Schema::table('nilai_rapots', function (Blueprint $table) {
            // Hapus kolom 'semester' lama
            $table->dropColumn('semester');

            // Tambahkan kolom baru
            $table->double('semester_ganjil_kelas_4');
            $table->double('semester_genap_kelas_4');
            $table->double('semester_ganjil_kelas_5');
            $table->double('semester_genap_kelas_5');
            $table->double('semester_ganjil_kelas_6');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nilai_rapots', function (Blueprint $table) {
             // Rollback: tambahkan kembali kolom 'semester'
             $table->enum('semester', [1, 2, 3, 4, 5]);

             // Hapus kolom yang baru ditambahkan
             $table->dropColumn([
                 'semester_ganjil_kelas_4',
                 'semester_genap_kelas_4',
                 'semester_ganjil_kelas_5',
                 'semester_genap_kelas_5',
                 'semester_ganjil_kelas_6'
             ]);
        });
    }
};
