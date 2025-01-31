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
        Schema::table('peringkat_calon_siswa_prestasis', function (Blueprint $table) {
            $table->integer('peringkat')->after('id_periode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peringkat_calon_siswa_prestasis', function (Blueprint $table) {
            $table->dropColumn('peringkat');
        });
    }
};
