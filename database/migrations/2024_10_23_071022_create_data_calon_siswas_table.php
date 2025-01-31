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
        Schema::create('data_calon_siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_periode')->constrained('periode_daftars')->onDelete('cascade');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->date('tgl_lahir');
            $table->string('tempat_lahir');
            $table->string('nik');
            $table->string('asal_sekolah');
            $table->text('alamat');
            $table->integer('tinggi_badan');
            $table->integer('berat_badan');
            $table->string('kegemaran');
            $table->boolean('penerima_kip');
            $table->string('no_kip')->nullable();
            $table->string('foto');
            $table->string('notelp');
            $table->boolean('zonasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_calon_siswas');
    }
};
